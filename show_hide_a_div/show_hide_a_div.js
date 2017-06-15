function show_hide(){
  if (document.getElementById('smallText').style.display != 'block' ) {
    document.getElementById('smallText').style.display = 'block';
    document.getElementById('tryToClick').innerHTML = 'Click to expand';
  }
  else {
    document.getElementById('smallText').style.display = 'none';
    document.getElementById('tryToClick').innerHTML = 'Click to collapse';
  }
  return false;
}
