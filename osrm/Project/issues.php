	<?php
	  	require '../config.php';
	  	echo "<div class='col-sm-6 col-xs-12'>";
	  	if($_GET['id'] != 0){
	  		$sqlTask = "select distinct id_task, id_proiect, denumire_task, id_utr_creator_task, descriere_task, id_utr_atribuire_task, 
	  		data_creare_task, data_final_task, prioritate_task, tip_task, estimare_originala_task, 
	  		timp_lucrat_task, stare_task, proiect.id_cpe, denumire_proiect, descriere_proiect, data_creare_proiect 
	  		from task, proiect, utilizator where 
	  			 task.id_pct = proiect.id_proiect and
	  			(utilizator.id_utilizator = task.id_utr_creator_task or utilizator.id_utilizator = task.id_utr_atribuire_task)  
	  			and stare_task = 1 and proiect.id_proiect =".$_GET['id'];		
		  	$resursaTask = $mysqli->query($sqlTask);
		  	echo "<hp>Active tasks: ".$resursaTask->num_rows."</p>";
			echo "<div id='accordion'>";
			  	while ($rowTask = $resursaTask->fetch_object()) {
					  echo "<p>".$rowTask->denumire_task." Status: ".$rowTask->stare_task."</p>";
					  echo "
					<div><p>".$rowTask->descriere_task."</p>
						<p style='background-color:red'>".$rowTask->stare_task."</p>
						<button type='submit' class='btn btn-primary'  name='addProiect' onclick='redirect()'>View Task</button>
					</div>
			  	";
			echo "</div>";
			echo "</div>";//col-sm-6
			  	}
	  	}else{
		  	header("Location: chooseProject.php");
	  	}

	?>
