1    <?php
2        class IndexController extends \Phalcon\Mvc\Controller
3        {
4            public function indexAction()
5            {
6                // INSERT CLIENTE
7                $ClienteInsert = new Cliente();
8                $ClienteInsert->nome = $this->request->getPost("nome");
9                $ClienteInsert->telefone = $this->request->getPost("telefone");
10                $ClienteInsert->cpf = $this->request->getPost("cpf");
11                $ClienteInsert->insert();
12
13                // INSERT CLIENTE ENDEREÇO
14                $ClienteInsert = new Cliente();
15                $ClienteInsert->nome = $this->request->getPost("nome");
16                $ClienteInsert->telefone = $this->request->getPost("telefone");
17                $ClienteInsert->cpf = $this->request->getPost("cpf");
18                $clienteAdicionado = $ClienteInsert->insert();
19
20                $EnderecoInsert = new Endereco();
21                $EnderecoInsert->codigo_cliente = $clienteAdicionado->codigo_cliente;
22                $EnderecoInsert->logradouro = $this->request->getPost("logradouro");
23                $EnderecoInsert->numero = $this->request->getPost("numero");
24                $EnderecoInsert->cep = $this->request->getPost("cep");
25                $EnderecoInsert->estado = $this->request->getPost("estado");
26                $EnderecoInsert->cidade = $this->request->getPost("cidade");
27                $EnderecoInsert->bairro = $this->request->getPost("bairro");
28                $EnderecoInsert->insert();
29
30                // UPDATE CLIENTE
31                $ClienteUpdate = new Cliente();
32                $ClienteUpdate->codigo_cliente = $this->request->getPost("codigo");
33                $ClienteUpdate->nome = $this->request->getPost("nome");
34                $ClienteUpdate->telefone = $this->request->getPost("telefone");
35                $ClienteUpdate->cpf = $this->request->getPost("cpf");
36                $ClienteUpdate->alterar();
37
38                // DELETE ENDEREÇO
39                $EnderecoDeletar = new Endereco();
40                $EnderecoDeletar->codigo_endereco = $this->request->getPost("codigo");
41                $EnderecoDeletar->deletar();
42
43                // DELETE CLIENTE
44                $ClienteDeletar = new Cliente();
45                $ClienteDeletar->codigo_cliente = $this->request->getPost("codigo");
46                $ClienteDeletar->deletar();
47
48                // SELECT CLIENTE
49                $Cliente = new Cliente();
50                $Cliente->codigo_cliente = $this->request->getPost("codigo");
51                $cliente = $Cliente->get();
52
53                // SELECT CLIENTE ENDEREÇO
54                $Cliente = new Cliente();
55                $Cliente->codigo_cliente = $this->request->getPost("codigo");
56                $clientes = $Cliente->getJoin(array('endereco' => true));
57            }
58        }
59    ?>