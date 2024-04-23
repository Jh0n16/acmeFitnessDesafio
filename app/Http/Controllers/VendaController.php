<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaRequest;
use App\Models\Estoque;
use App\Models\EstoqueVenda;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Venda::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendaRequest $request)
    {
        $valorDoFrete = 10;

        $itensDoPedido = json_decode($request->input('variacoesDosProdutos'), true);

        $totalDoPedido = $this->calculaTotalDoPedido($itensDoPedido, $valorDoFrete);
        
        $desconto = $this->calculaDesconto($request->input('formaDePagamento'), $totalDoPedido);

        $venda = Venda::create([
            'dataDaVenda' => $request->input('dataDaVenda'),
            'variacoesDosProdutos' => $request->input('variacoesDosProdutos'),
            'valorTotal' => round($totalDoPedido - $desconto, 2),
            'valorDoFrete' => $valorDoFrete,
            'desconto' => $desconto,
            'formaDePagamento' => $request->input('formaDePagamento'),
            'cliente_id' => $request->input('cliente_id'),
            'endereco_id' => $request->input('endereco_id'),
        ]);

        foreach ($itensDoPedido as $item) {
            $estoque = Estoque::findOrFail($item['estoque_id']);

            $this->atualizaEstoque($estoque, $item['quantidade']);
            EstoqueVenda::create([
                'venda_id' => $venda->id,
                'estoque_id' => $estoque->id
            ]);
        }

        return json_encode(["mensagem"=> "Venda criada com sucesso!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Venda::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendaRequest $request, string $id)
    {
        $valorDoFrete = 10;

        $itensDoPedido = json_decode($request->input('variacoesDosProdutos'), true);

        $totalDoPedido = $this->calculaTotalDoPedido($itensDoPedido, $valorDoFrete);
        
        $desconto = $this->calculaDesconto($request->input('formaDePagamento'), $totalDoPedido);

        Venda::findOrFail($id)->update([
            'dataDaVenda' => $request->input('dataDaVenda'),
            'variacoesDosProdutos' => $itensDoPedido,
            'valorTotal' => round($totalDoPedido - $desconto, 2),
            'valorDoFrete' => $valorDoFrete,
            'desconto' => $desconto,
            'formaDePagamento' => $request->input('formaDePagamento'),
            'cliente_id' => $request->input('cliente_id'),
            'endereco_id' => $request->input('endereco_id'),
        ]);

        return json_encode(["mensagem"=> "Venda modificada com sucesso!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Venda::destroy($id);

        return json_encode(["mensagem"=> "Venda deletada com sucesso!"]);

    }

    public function produtosMaisVendidos()
    {
        return EstoqueVenda::join('estoques', 'estoque_id', '=', 'estoques.id')
                ->join('produtos', 'produto_id', '=', 'produtos.id')
                ->select('produtos.*')
                ->orderBy('produtos.id')
                ->get();
    }

    private function calculaDesconto(string $formaDePagamento, float $totalDaCompra): float
    {
        switch ($formaDePagamento) {
            case 'pix':
                $desconto = round($totalDaCompra * 0.1, 2);
                break;
            
            default:
                $desconto = 0;
                break;
        }

        return $desconto;
    }

    private function calculaTotalDoPedido(array $itens, float $valorDoFrete): float
    {
        $totalDoPedido = 0;

        foreach ($itens as $item) {
           $totalDoPedido += $item['quantidade'] * $item['precoDeVenda'];
        }

        $totalDoPedido += $valorDoFrete;

        return $totalDoPedido;
    }
    
    private function atualizaEstoque(Estoque $estoque, int $quantidadeDosProdutos)
    {
        return $estoque->update([
            'quantidadeDoEstoque' => $estoque->quantidadeDoEstoque - $quantidadeDosProdutos
        ]);
    }

}