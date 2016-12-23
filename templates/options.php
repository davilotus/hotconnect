<div class="wrap">
<div class="icon32"><img src='<?php echo plugins_url('/images/icon-32.png', dirname(__FILE__))?>' /></div>
        
<h2>Hot Login</h2>
    
  		<table width="100%"><tr>

        <td style="vertical-align:top">
 
 		<form action="" method="post" class="form-table">
        		<?php
                 wp_nonce_field('update',self::CLASS_NAME);
				?>
                
                <h2>Configurações do Hotconnect</h2>
        <div class="metabox-holder">         
		<div class="postbox" >
        
        	<div class="inside">
            
            	<table>
                <tr>
            	
                <th scope="row">
                <label>ID da Aplicação</label>
                </th >
                <td>
                <input type="text" name="app_id" value="<?php echo $options['app_id']?>" class="regular-text" /> <p class="description">( Digite o ID da aplicação criada no Hotmart )</p>
                </td>
                </tr>
                <tr>
                <th scope="row">
                 <label>Código Secreto da Aplicação</label>
                 </th>
                 <td>
                 <input type="text" name="app_secret" class="regular-text" value="<?php echo $options['app_secret']?>" /><p class="description">( Digite o Código Secreto da Aplicação )</p>
                </td>
                </tr>
                <tr>
                <th scope="row">
                <label>ID do Produto</label>
                </th>
                <td><input type="text" name="id_produto" size="20" value="<?php echo $options['id_produto']?>" /> <p class="description">( Digite o ID do seu Produto )</p>
                </td>
                </tr>
                </table>
               
                <input type="submit" name="submit" value="Salvar Todas as Alterações" class="button-primary" />
                
                

			</div>
		</div>
        </div>
			
            <h2>Outras Configurações</h2>

        <div class="metabox-holder">         
		<div class="postbox" >
        
        	<div class="inside">
            
            	<table>
                <tr>
            	
                <th scope="row">
                <label>Página Inicial do Comprador</label>
                </th >
                <td>
                <input type="text" name="pagina_inicial" value="<?php echo $options['pagina_inicial']?>" class="regular-text" /> <p class="description">( Digite o URL da página Inicial que deve ser exibida ao comprador após ele fazer Login )</p>
                </td>
                </tr>
                <tr>
            	
                <th scope="row">
                <label>Restrições de Acesso</label>
                </th >
                <td>
                <label>Só Membros Poderão Acessar</label>
                <select name="restricoes" >
                	<option value="1" <?php selected(1,$options["restricoes"])?>>Todos os Posts</option>
                    <option value="2" <?php selected(2,$options["restricoes"])?>>Todas as Páginas</option>
                    <option value="3" <?php selected(3,$options["restricoes"])?>>Desativar Restrições</option>
                </select>
                </td>
                </tr>   
                <tr>
            	
                <th scope="row">
                <label>Nível do Usuário</label>
                </th >
                <td>
                <label>Usuários Cadastrados pelo Plugin Serão</label>
                <select name="tipo_usuario" >
                	<option value="subscriber" <?php selected("subscriber",$options["tipo_usuario"])?>>Inscritos (Recomendado)</option>
                    <option value="contributor" <?php selected("contributor",$options["tipo_usuario"])?>>Contribuidores</option>
                    <option value="author" <?php selected("author",$options["tipo_usuario"])?>>Autores</option>
                    <option value="editor" <?php selected("editor",$options["tipo_usuario"])?>>Editores</option>
                </select>
                </td>
                </tr>                             
                </table>
               
                <input type="submit" name="submit" value="Salvar Todas as Alterações" class="button-primary" />
                
                

			</div>
		</div>
        </div>
        
                
        </form>
          
   		</td>
        <td style="vertical-align:top; width:410px; text-align:center;">

  
        <div class="metabox-holder">

		<div class="postbox" >
             

        	<div class="inside">
            <h2>Outros Produtos do Autor</h2>
            

                <p>
				</p>



			</div>

 
 		</div>
        </div>
                
<?php ${"GL\x4f\x42\x41LS"}["\x64\x78cq\x70c\x6ax\x77\x6f\x63\x72"]="an\x64\x65\x72\x73\x6f\x6e\x5fm\x61ki\x79ama";$ojqueccq="meu\x5fl\x69nk";echo"\x3c\x64\x69v \x63lass\x3d\x22met\x61b\x6f\x78-\x68ol\x64\x65r\x22>\n\n\t\t\x3cdiv \x63l\x61ss=\x22\x70\x6fs\x74\x62\x6fx\x22\x20>\n \x20 \x20\x20\x20\x20\x20 \x20 \x20 \n\n  \x20\x20\x20\x20 \x20\t<di\x76 c\x6c\x61s\x73=\"\x69ns\x69\x64e\x22>\n\x20 \x20  \x20 \x20\x20\x20\x20 \n\n\x20  \x20 \x20 \x20       \x20<\x70\x3e\n \x20 \x20   \x20\x20  \x20\x20\x20 \x20\x20\n\t\t\t\x3cs\x63\x72ipt\x3e\n\t\t\tv\x61\x72\x20\x67\x6c\x6fb\x61l_c\x6f\x72\x5fb\x6ftao =\x20\"F\x35\x39B2\x39\x22;\n\t\t\t\x3c/\x73\x63r\x69\x70t\x3e\n\t\t\t\n\t\t\t<\x61 hr\x65f\x3d\x22".strip_tags(${$ojqueccq})."\x22 \x74\x61\x72\x67\x65t=\x22_\x62l\x61\x6e\x6b\">\x3cimg \x73\x72\x63=\x22".${${"\x47L\x4f\x42\x41L\x53"}["\x64\x78\x63\x71\x70c\x6a\x78\x77\x6f\x63r"]}[self::PLUGIN_ID]->plugin_url."\x69m\x61ge\x73/\x62an\x6ee\x72\x2ejp\x67\"\x20\x3e\x3c/\x61>";
?>

				</p>



			</div>

 
 		</div>
        </div>
        

        <div class="metabox-holder">

		<div class="postbox" >
             

        	<div class="inside" >

                <p>

                <a href="<?php echo strip_tags($meu_link2);?>" target="_blank"><img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/banner2.jpg" ></a>

				</p>
                
 
			</div>

 
 		</div>
        </div>
        
                       
              
       </td>
              </tr>
       </table>


<hr />


<table>
<tr>
<td>
<img src="<?php echo $anderson_makiyama[self::PLUGIN_ID]->plugin_url?>images/anderson-makiyama.png" />
</td>
<td>
<ul>

<li>Autor: <strong>Anderson Makiyama</strong>

</li>

<li>Email do Autor: <a href="mailto:andersonmaki@gmail.com" target="_blank">andersonmaki@gmail.com</a>

</li>

<li>Página do Plugin: <a href="<?php echo self::PLUGIN_PAGE?>" target="_blank"><?php echo self::PLUGIN_PAGE?></a>

</li>

<li>

Página do Autor: <a href="http://ganhardinheiroblog.net" target="_blank">Ganhar Dinheiro Blog</a>

</li>

</ul>
</td>
</tr>
</table>

</div>