if (document.getElementById('liveToast')) {
  const toastLiveExample = document.getElementById('liveToast');
  const toastBootstrap = new bootstrap.Toast(toastLiveExample);
  toastBootstrap.show();
}