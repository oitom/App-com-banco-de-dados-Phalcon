1    <?php
2    use Phalcon\Mvc\Model;
3
4    class Cliente extends Model
5    {
6        public $codigo_cliente;
7        public $nome;
8        public $telefone;
9       public $cpf;
10        public $endereco;
11
12        public function initialize()
13        {
14            $this->setSource("clientes");
15        }
16
17        public function getSource()
18        {
19            return 'clientes';
20        }
21
22        public function get()
23        {
24            $condicao = "codigo_cliente = :codigo_cliente:";
25            $where = array('codigo_cliente' => $this->codigo_cliente);
26            $clientes = Cliente::find(array($condicao, "bind" => $where ));
27
28            return $clientes;
29        }
30
31        public function getJoin($tabela = array())
32        {
33            $clientes = $this->get();
34
35            if(isset($tabela["endereco"])) {
36                $Endereco = new Endereco();
37                $Endereco->codigo_cliente = $this->codigo_cliente;
38                $clientes[0]->endereco = $Endereco->get();
39            }
40            return $clientes;
41        }
42
43        public function insert()
44        {
45            return $this->save();
46        }
47
48        public function alterar()
49        {
50            $Cliente = Cliente::findFirst($this->codigo_cliente);
51            $Cliente->nome = $this->nome;
52            $Cliente->telefone = $this->telefone;
53            $Cliente->cpf = $this->cpf;
54            $Cliente->update();
55        }
56
57        public function deletar()
58        {
59            $Endereco = new Endereco();
60            $Endereco->codigo_cliente = $this->codigo_cliente;
61            $Enderecos = $Endereco->get();
62
63            if(!empty($Enderecos)){
64                $EnderecoDeletar = new Endereco();
65                $EnderecoDeletar->codigo_endereco = $Enderecos[0]->codigo_endereco;
66                $EnderecoDeletar->deletar();
67            }
68            $this->delete();
69        }
70    }