<!-- jumbotron -->

<div class="jumbotron">
  <h1 class="display-3">FX FINDER</h1>
  <p class="lead">Check foreign exchange  rate on your birthday in FX Finder</p>
  <hr class="my-4">
 </div>
<!-- jumbotron -->

 <div class="container-fluid">

<div class="row">
	
<div class="col-sm-6">

<form  method="post" action="SubmitAction.php">


<div class="form-group">






   



         <label for="validationDefault01" >DOB</label>

		  <div class="input-group">
   
    <div class='input-group date' >
    <div class="input-group-prepend">
          <span class="input-group-text" id="validationDefault01"></span>
        </div>

        <input type='text' class="form-control" id="validationDefault01" name="dob" placeholder="DD/MM/YYYY"  aria-describedby="inputGroupPrepend2" required />

  
        <span class="input-group-addon">
            <i class="material-icons">date_range</i>


     
        </span>
		
		</div>
    </div>
</div>

 <div class="form-group">
    <label for="exampleFormControlSelect1">Base Currency</label>
    <select class="form-control" id="exampleFormControlSelect1" name="From_Currency" readonly>
    <option>EUR</option>  
    </select>
  </div>

  
 <div class="form-group">
    <label for="exampleFormControlSelect1">To Currency</label>
    <select class="form-control" id="exampleFormControlSelect1" name="To_Currency">
      <option>USD</option>
      <option>INR</option>
      <option>GBP</option>
      
    </select>
  </div>

<button class="btn btn-primary" type="submit" name="action">Submit</button>

  </div>
</form>

<div class="col-sm-6">


        <h6>Rate for selected parametr is  <h3>{$smarty.get.rate}</h3></h6>
       
      {if ($smarty.get.rate == 0)}

	<h6>Please try again </h6>
		
        {/if}
      </div>

  </div>


  <div class="row">
	
<div class="col-sm-12">
 
	
    </div>
  </div>
  <hr>
<div class="row">
	
<div class="col-sm-12">





    <h6>Submission History</h6>

  



   <table class="table table-hover">
    <thead>
      <tr>
     <th >DOB</th>
      <th >form Currency</th>
      <th >To Currency</th>
      <th >Rate</th>
	   <th >Count</th>
      </tr>
    </thead>
    <tbody>
       {section name=i loop=$dob_rate start=0 step=1}
      <tr>
         <td>{$dob_rate[i].dob|date_format:"%d  %B  %Y"}</td>
      <td>{$dob_rate[i].base_currency}</td>
      <td>{$dob_rate[i].to_currency}</td>
      <td>{$dob_rate[i].rate}</td>
      <td>{$dob_rate[i].count}</td>
	  

       
        </td>
      </tr>
  {/section }
      </tbody>
  </table>
      
 

  <!--Form End -->
  







</div>

</div>

 
  
</div>
