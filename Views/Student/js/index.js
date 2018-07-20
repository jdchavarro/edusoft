var ip = 0;
window.RTCPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection || false;

if (window.RTCPeerConnection)
{
  var pc = new RTCPeerConnection({iceServers:[]}), noop = function(){};
  pc.createDataChannel('');
  pc.createOffer(pc.setLocalDescription.bind(pc), noop);

  pc.onicecandidate = function(event)
  {
    if (event && event.candidate && event.candidate.candidate)
    {
      var s = event.candidate.candidate.split('\n');
      document.getElementById("ip").value = s[0].split(' ')[4];
    }
  }
}