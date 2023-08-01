<?php

namespace App\Http\Controllers;

use App\Models\Depoimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepoimentosController extends Controller
{
    /**
     * Armazena um novo depoimento no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os campos enviados no request
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'depoimento' => 'required',
            'nome_user' => 'required|string',
        ]);

        // Obtém os dados do request, excluindo o token CSRF (_token)
        $data = $request->except('_token');

        // Verifica se há uma imagem no request e a salva no sistema de arquivos
        if ($request->hasFile('foto')) {
            $userNome = preg_replace('/\s+/', '_', $data['nome_user']); // Remove espaços e substitui por _
            $fileName = $userNome . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('depoimentos', $fileName, 'public');
            $data['foto'] = $path;
        }

        // Cria um novo depoimento no banco de dados usando o modelo Depoimentos
        $depoimento = Depoimentos::create($data);

        // Retorna a resposta em formato JSON com o depoimento criado e o status 201 (Created)
        return response()->json($depoimento, 201);
    }

    /**
     * Exibe um depoimento específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busca o depoimento pelo ID no banco de dados
        $depoimento = Depoimentos::find($id);

        // Verifica se o depoimento foi encontrado
        if ($depoimento != null) {
            // Retorna a resposta em formato JSON com o depoimento encontrado
            return response()->json($depoimento);
        }

        // Retorna a resposta em formato JSON com a mensagem de erro e o status 404 (Not Found)
        return response()->json(['message' => 'Depoimento não encontrado!'], 404);
    }

    /**
     * Exibe 3 depoimentos aleatoriamente.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_3()
    {
        // Busca 3 depoimentos aleatoriamente no banco de dados
        $depoimentos = Depoimentos::inRandomOrder()->take(3)->get()->all();

        // Verifica se foram encontrados depoimentos
        if (count($depoimentos) > 0) {
            // Retorna a resposta em formato JSON com os depoimentos encontrados
            return response()->json($depoimentos, 200);
        }

        // Retorna a resposta em formato JSON com a mensagem de erro e o status 404 (Not Found)
        return response()->json(['message' => 'Nenhum depoimento encontrado!'], 404);
    }

    /**
     * Atualiza um depoimento no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valida os campos enviados no request
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'depoimento' => 'required',
            'nome_user' => 'required',
        ]);

        // Obtém os dados do request, excluindo o token CSRF (_token) e o método HTTP (_method)
        $data = $request->except(['_token', '_method']);

        // Verifica se há uma imagem no request e a salva no sistema de arquivos
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('depoimentos', 'public');
        }

        // Busca o depoimento pelo ID no banco de dados
        $depoimento = Depoimentos::findOrFail($id);

        // Atualiza os dados do depoimento no banco de dados
        $depoimento->update($data);

        // Retorna a resposta em formato JSON com o depoimento atualizado e o status 200 (OK)
        return response()->json($depoimento, 200);
    }

    /**
     * Remove um depoimento do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busca o depoimento pelo ID no banco de dados
        $depoimento = Depoimentos::findOrFail($id);

        // Exclui o depoimento do banco de dados
        $depoimento->delete();

        // Retorna a resposta em formato JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json(['message' => 'Depoimento excluído com sucesso!'], 200);
    }
}
