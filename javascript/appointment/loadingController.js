// To show the loading overlay and spinner
const appointmentLoading_showLoadingOverlay = (id='appointment-loadingOverlay') => {
  document.getElementById(id).classList.add('show');
}


// To hide the loading overlay and spinner
const appointmentLoading_hideLoadingOverlay = (id='appointment-loadingOverlay') => {

  document.getElementById(id).classList.remove('show');
  
  // setTimeout(()=>{
  //   document.getElementById(id).classList.remove('show');
  // }, 10000)
  
}