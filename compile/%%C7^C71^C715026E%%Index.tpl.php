<?php /* Smarty version 2.6.22, created on 2018-06-21 19:41:29
         compiled from Index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Index.tpl', 126, false),)), $this); ?>
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


        <h6>Rate for selected parametr is  <h3><?php echo $_GET['rate']; ?>
</h3></h6>
       
      <?php if (( $_GET['rate'] == 0 )): ?>

	<h6>Please try again </h6>
		
        <?php endif; ?>
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
       <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dob_rate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['start'] = (int)0;
$this->_sections['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
if ($this->_sections['i']['start'] < 0)
    $this->_sections['i']['start'] = max($this->_sections['i']['step'] > 0 ? 0 : -1, $this->_sections['i']['loop'] + $this->_sections['i']['start']);
else
    $this->_sections['i']['start'] = min($this->_sections['i']['start'], $this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] : $this->_sections['i']['loop']-1);
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = min(ceil(($this->_sections['i']['step'] > 0 ? $this->_sections['i']['loop'] - $this->_sections['i']['start'] : $this->_sections['i']['start']+1)/abs($this->_sections['i']['step'])), $this->_sections['i']['max']);
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
      <tr>
         <td><?php echo ((is_array($_tmp=$this->_tpl_vars['dob_rate'][$this->_sections['i']['index']]['dob'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d  %B  %Y") : smarty_modifier_date_format($_tmp, "%d  %B  %Y")); ?>
</td>
      <td><?php echo $this->_tpl_vars['dob_rate'][$this->_sections['i']['index']]['base_currency']; ?>
</td>
      <td><?php echo $this->_tpl_vars['dob_rate'][$this->_sections['i']['index']]['to_currency']; ?>
</td>
      <td><?php echo $this->_tpl_vars['dob_rate'][$this->_sections['i']['index']]['rate']; ?>
</td>
      <td><?php echo $this->_tpl_vars['dob_rate'][$this->_sections['i']['index']]['count']; ?>
</td>
	  

       
        </td>
      </tr>
  <?php endfor; endif; ?>
      </tbody>
  </table>
      
 

  <!--Form End -->
  







</div>

</div>

 
  
</div>