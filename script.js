// enbles one to not pick yesterdays date
let today = new Date().toISOString().split('T')[0];
document.getElementsByName("txtDate")[0].setAttribute('min', today)