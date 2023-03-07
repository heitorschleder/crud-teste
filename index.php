<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/create.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Registrar</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Nome</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Digite seu nome">
		   </div>

		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"
		           placeholder="Digite seu email">
		   </div>

		   <div class="form-group">
		     <label for="phone">Telefone</label>
		     <input type="phone" 
		           class="form-control" 
				   maxlength="11"
		           id="phone" 
		           name="phone" 
		           value="<?php if(isset($_GET['phone']))
		                           echo($_GET['phone']); ?>" 
		           placeholder="Exemplo: (48) 99999-9999">
		   </div>
		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Cadastrar</button>
		    <a href="read.php" class="link-primary">Ver lista</a>
	    </form>
	</div>
</body>
</html>