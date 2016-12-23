=== Hot Login ===
Contributors: Davidson Silva
Tags: hotmart, hotconnect, hotmembers
Requires at least: 3.0
Tested up to: 4.2.2
Stable tag: trunk

Integre seu site Wordpress com o Hotmart, libere e bloqueie acesso de forma automatica conforme o status da compra

== Description ==

**Visão Geral**

Esse plugin é útil para quem é produtor no Hotmart. Ele permite você liberar acesso a conteúdo restrito que está no seu site feito em WP. O plugin utiliza a API Hotconnect para verificar o status da compra, e conforme o status ele faz o login automático do usuário e redireciona-o para a página restrita inicial que você mesmo configura na página de opções.

O Plugin insere o usuário no seu banco de dados do WP, mas bloqueia o login via WP para estes usuários oriundos do Hotmart. Isso é perfeito, pois se o usuário cancelar uma compra no Hotmart, ele não mais conseguirá acessar a área restrita do se site WP.

Você ainda estará habilitado a cadastrar usuários manualmente através do painel do WP, e estes usuários farão login normal.



**Recursos**

* Faz login automático no seu site Wordpress após o comprador fazer login pelo Hotmart.

* Bloqueia o acesso aos posts e páginas restritas caso o usuário cancele a compra.

* Não permite usuários cadastrados pelo plugin fazerem login pelo painel do WP, mas somente pelo Hotmart.

* Permite você configurar qual será a página restrita Inicial do comprador. Ele será redirecionado para essa página logo após fazer login.

* Exibe um relatório dos últimos mil login feitos via Hotmart.

**Sobre**

O Plugin foi adaptado por Daviodson Silva (base do plugin por Anderson Makiyama)



== Installation ==

Para instalar o plugin, siga os passos:

1- Envie a pasta do plugin para a pasta de plugins do seu site WP. Geralmente é esta: /wp-content/plugins/
2- Faça login em seu painel de gerenciamento e ative o plugin Hot Login.
3- Após ativar aparecerá na lateral esquerda do seu painel as páginas de opção e relatório do Plugin.
4- Informe os dados necessários e salve as alterações.

== License ==

This file is part of this plugin.
This Plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
This plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Publish Anonymous Posts. If not, see <http://www.gnu.org/licenses/>.

== Frequently Asked Questions ==

= Posso sugerir ideias para esse plugin? =
Sim, claro. É só deixar um comentário em [Plugin HotConnect](http://www.davidsonsilva.com.br/contato)

== Screenshots ==
1. Página de Opções do Plugin

== Changelog ==

= 1.0 =
* Publicação do plugin

= 1.1 =
* Adicionada opção para restringir acesso a todas as páginas, ou a todos os posts, ou destivar restrição.
* Adicionada opção para definir o nível do usuário que é automaticamente cadastrado (inscrito, colaborador, autor, editor, etc)

= 1.2 =
* Corrigi alguns erros