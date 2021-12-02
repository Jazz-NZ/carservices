
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openEditForm() {
  document.getElementById("eModal").style.display = "block";
  const checked = $('input[name=checked-donut]:checked'); //getting seleted row id
  
    request = $.ajax({
        url: 'handler/getRepair.php',
        type: 'post',
        data: {'id': checked.val()},
        dataType: 'json'
    });


    request.done(function (response, textStatus, jqXHR) {
        console.log('Loading form data');
        $('#descripton').val(response[0]['descr']);
        console.log(response[0]['descr']);

        // $('#katedra').val(response[0]['katedra'].trim());
        // console.log(response[0]['katedra'].trim());

        $('#idCar').val(response[0]['idCar'].trim());
        console.log(response[0]['idCar'].trim());

        $('#dateFrom').val(response[0]['dateFrom'].trim());
        console.log(response[0]['dateFrom'].trim());
        
        $('#dateTo').val(response[0]['dateTo'].trim());
        console.log(response[0]['dateTo'].trim());

        $('#id').val(checked.val());

        console.log(response);
    });
}
function closeEditForm() {
  document.getElementById("eModal").style.display = "none";
}


function onSubmit(){

  event.preventDefault();
  console.log("Adding new repair");
  const $form =$('#addForm');
  const $input = $form.find('input, select, button, textarea');

  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  $input.prop('disabled', true);

  req = $.ajax({
      url: 'handler/addRepair.php',
      type:'post',
      data: serijalizacija
  });

  req.done(function(res, textStatus, jqXHR){
      if(res=="Success"){
          
          location.reload(true);
      }else console.log("Repair is NOT added!!! "+res);
      console.log(res);
  });

  req.fail(function(jqXHR, textStatus, errorThrown){
      console.error('Error occured '+textStatus, errorThrown)
  });
}

function deleteRow(){

  console.log("Deleting selected repair");

  const checked = $('input[name=checked-donut]:checked');

  console.log(checked.val());

  req = $.ajax({
      url: 'handler/deleteRepair.php',
      type:'post',
      data: {'id':checked.val()}
  });

  req.done(function(res, textStatus, jqXHR){
      if(res=="Success"){
         checked.closest('tr').remove();
         alert('Repair is deleteed');
         console.log('Deleted');
      }else {
      console.log("Repair is NOT deleted "+res);
      alert("Kolokvijum nije obrisan ");

      }
      console.log(res);
  });

}

function onEdit(){

  event.preventDefault();
  console.log("Editing repair");
  const $form =$('#efrm');
  const $input = $form.find('input, select, button, textarea');

  const checked = $('input[name=checked-donut]:checked');
  console.log($('#efrm').length);
  const serijalizacija = $form.serialize();
  console.log(serijalizacija);
  

  $input.prop('disabled', true);

  req = $.ajax({
      url: 'handler/updateRepair.php',
      type:'post',
      //data: {'id':checked.val(), serijalizacija}
      data: serijalizacija
  });

  req.done(function(res, textStatus, jqXHR){
      if(res=="Success"){
          
          location.reload(true);
      }else console.log("Repair is NOT updated!!! "+res);
      console.log(res);
  });

  req.fail(function(jqXHR, textStatus, errorThrown){
      console.error('Error occured '+textStatus, errorThrown)
  });

}