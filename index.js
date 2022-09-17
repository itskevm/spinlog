/*
function formatCurrentDate() {
  var d = new Date(),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) 
    month = '0' + month;
  if (day.length < 2) 
    day = '0' + day;

  return [year, month, day].join('-');
}
document.getElementById("fecha").value = formatCurrentDate();
console.log(document.getElementById("fecha").value)
*/
function viewHistory() {
  window.location = '/view';
}

function newEntry() {
	window.location = '../';
}

function detailsBetweenDates() {
  // currently unused = no link points there, only accesible by form
	window.location = '/calculate-details';
}

function deleteRecord() {
  var fullDeletion = confirm("Press OK to confirm deletion.");
  if (fullDeletion == true) {
    document.getElementById("deletion").submit();
    //window.location = '../delete';
  }
}

function properSubmit() {
  this.disabled=true;
  this.value='Sending…';
  form.submit();
  // TO DO: add validation
}

const gasInput = document.getElementById("oneNumber");
gasInput.addEventListener('input', function () {
  console.log(this.value);
  
  if (this.value < 0)
  {
    this.value = 3.00;
  }
});
gasInput.addEventListener('focusout', function () {
  this.value = "3.00";
});