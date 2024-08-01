// (A) HELPER FUNCTIONS
var helper = {
  // (A1) ARRAY BUFFER TO BASE 64
  atb : b => {
    let u = new Uint8Array(b), s = "";
    for (let i=0; i<u.byteLength; i++) { s += String.fromCharCode(u[i]); }
    return btoa(s);
  },

  // (A2) BASE 64 TO ARRAY BUFFER
  bta : o => {
    let pre = "=?BINARY?B?", suf = "?=";
    for (let k in o) { if (typeof o[k] == "string") {
      let s = o[k];
      if (s.substring(0, pre.length)==pre && s.substring(s.length - suf.length)==suf) {
        let b = window.atob(s.substring(pre.length, s.length - suf.length)),
            u = new Uint8Array(b.length);
        for (let i=0; i<b.length; i++) { u[i] = b.charCodeAt(i); }
        o[k] = u.buffer;
      }
    } else { helper.bta(o[k]); }}
  },

  // (A3) AJAX FETCH
  ajax : (url, data, after) => {
    let form = new FormData();
    for (let [k,v] of Object.entries(data)) { form.append(k,v); }
    fetch(url, { method: "POST", body: form })
    .then(res => res.text())
    .then(res => after(res))
    .catch(err => { toastr.error(err.message); console.error(err); });//alert("ERROR!");
  }
};


// (B) REGISTRATION
var register = {
  // (B1) CREATE CREDENTIALS
  a : () => helper.ajax(APP_URL+"webregister", {
    phase : "a"
  }, async (res) => {
    try {
      res = JSON.parse(res);
      helper.bta(res);
      register.b(await navigator.credentials.create(res));
    } catch (e) { toastr.error(res); console.error(e); }//alert(res);
  }),

  // (B2) SEND CREDENTIALS TO SERVER
  b : cred => helper.ajax(APP_URL+"webregister", {
    phase : "b",
    transport : cred.response.getTransports ? cred.response.getTransports() : null,
    client : cred.response.clientDataJSON ? helper.atb(cred.response.clientDataJSON) : null,
    attest : cred.response.attestationObject ? helper.atb(cred.response.attestationObject) : null
  }, res => toastr.success(res))//alert(res)
};

// (C) VALIDATION
var validate = {
  // (C1) GET CREDENTIALS
  a : () => helper.ajax(APP_URL+"webauthnvalid", {
    phase : "a"
  }, async (res) => {
    try {
      res = JSON.parse(res);
      helper.bta(res);
      validate.b(await navigator.credentials.get(res));
    } catch (e) { toastr.error(res); console.error(e); }//alert(res)
  }),

  // (C2) SEND TO SERVER & VALIDATE
  b : cred => helper.ajax(APP_URL+"webauthnvalid", {
    phase : "b",
    id : cred.rawId ? helper.atb(cred.rawId) : null,
    client : cred.response.clientDataJSON  ? helper.atb(cred.response.clientDataJSON) : null,
    auth : cred.response.authenticatorData ? helper.atb(cred.response.authenticatorData) : null,
    sig : cred.response.signature ? helper.atb(cred.response.signature) : null,
    user : cred.response.userHandle ? helper.atb(cred.response.userHandle) : null
  }, res =>  toastr.success(res) )//alert(res)
};
