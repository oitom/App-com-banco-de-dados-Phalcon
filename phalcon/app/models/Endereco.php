1    <?php
2    use Phalcon\Mvc\Model;
3
4    class Endereco extends Model
5    {
6        public $codigo_endereco;
7        public $codigo_cliente;
8        public $logradouro;
9        public $numero;
10        public $cep;
11        public $estado;
12        public $cidade;
13        public $bairro;
14
15        public function initialize()
16        {
17            $this->setSource("enderecos");
18        }
19
20        public function getSource()
21        {
22            return 'enderecos';
23        }
24
25        public function get()
26        {
27            $condicao ="";
28            $where = array();
29            if ($this->codigo_cliente){
30                $condicao = "codigo_cliente = :codigo_cliente:";
31                $where['codigo_cliente'] = $this->codigo_cliente;
32            }
33            if ($this->codigo_endereco){
34                $condicao = "codigo_endereco = :codigo_endereco:";
35                $where['codigo_endereco'] = $this->codigo_endereco;
36            }
37
38            $enderecos = Endereco::find(array( $condicao, "bind" => $where  ));
39
40            return $enderecos;
41        }
42
43        public function insert()
44        {
45            return $this->save();
46        }
47
48        public function deletar()
49        {
50            $this->delete();
51        }
52    }