const T=localStorage.getItem("theme");$("html").addClass(T);class _{static showError(r,n){const l=`
         <div class="toast align-items-center text-bg-danger border-0 show rounded-1" style="flex-basis: unset;font-size: 14px;display: none" role="alert" aria-live="assertive"
             aria-atomic="true" id="error-${n}">
            <div class="d-flex justify-content-between">
                <div class="toast-body">${r}</div>
                <button type="button" class="btn-close btn-close-white me-2 my-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function () {
                    $('#error-${n}').hide().fadeIn();
                }, 0);

                setTimeout(function () {
                    $('#error-${n}').remove()
                }, 3000)
            <\/script>
        </div>
    `;$("#validation").append(l)}static showSuccess(r,n){const l=`
         <div class="toast align-items-center text-bg-success border-0 show rounded-1" style="flex-basis: unset; font-size: 14px;display: none" role="alert" aria-live="assertive"
             aria-atomic="true" id="error-${n}">
            <div class="d-flex justify-content-between">
                <div class="toast-body">${r}</div>
                <button type="button" class="btn-close btn-close-white me-2 my-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function () {
                    $('#error-${n}').hide().fadeIn();
                }, 500);

                setTimeout(function () {
                    $('#error-${n}').remove()
                }, 3000)
            <\/script>
        </div>
    `;$("#validation").append(l)}}window.generateForm=function(r,n){const l=$("form#"+n);if(l.length===0){console.error('Form với ID "'+n+'" không tồn tại');return}$.each(r,function(u,i){let e=l.find('[name="'+u+'"]');if(e.length===0&&(e=l.find("#"+u)),e.length>0){const o=e.prop("tagName").toLowerCase(),s=e.attr("type");if(o==="input")if(s==="checkbox")if(Array.isArray(i))e.each(function(){const t=i.includes($(this).val());$(this).prop("checked")!==t&&$(this).prop("checked",t)});else{const t=i===!0||i===e.val();e.prop("checked")!==t&&e.prop("checked",t)}else if(s==="radio"){const t=l.find('[name="'+u+'"][value="'+i+'"]');t.prop("checked")||t.prop("checked",!0)}else s==="number"?parseFloat(e.val())!==parseFloat(i)&&e.val(i):s==="file"?a(e,i,u):e.val()!==i&&e.val(i);else if(o==="select")if(e.hasClass("select2-hidden-accessible")){const t=e.val();e.prop("multiple")?c(t,i)||e.val(i).trigger("change"):t!=i&&e.val(i).trigger("change")}else{const t=e.val();e.prop("multiple")?c(t,i)||e.val(i):t!=i&&e.val(i)}else o==="textarea"&&e.val()!=i&&e.val(i)}function a(o,s,t){const f=o;let p=f.closest(".form-group, .mb-3, .field-wrapper").find(".file-preview-container");if(p.length===0&&(p=$('<div class="file-preview-container mt-2"></div>'),f.after(p)),p.empty(),!!s)try{let m=[];if(typeof s=="string")try{m=JSON.parse(s)}catch{m=[s]}else Array.isArray(s)&&(m=s);if(m.length>0){const w=$('<div class="preview-title mb-2"><small class="text-muted">Ảnh hiện có:</small></div>');p.append(w);const y=$('<div class="images-preview-list d-flex flex-wrap gap-2"></div>');m.forEach((g,E)=>{if(g&&g.trim()!==""){const P=b(g,E,t);y.append(P)}}),p.append(y)}}catch(m){console.error("Error handling file input preview:",m)}}function b(o,s,t){const f=$(`
                <div class="image-preview-item position-relative" style="width: 100px; height: 100px;">
                    <img src="${o}"
                         class="img-thumbnail w-100 h-100"
                         style="object-fit: cover; cursor: pointer;"
                         alt="Preview ${s+1}"
                         data-bs-toggle="modal"
                         data-bs-target="#imagePreviewModal"
                         onclick="showImageModal('${o}')">
                    <button type="button"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle p-0 remove-image-btn"
                            style="width: 20px; height: 20px; font-size: 10px; line-height: 1;"
                            data-index="${s}"
                            data-field="${t}"
                            title="Xóa ảnh">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `);return f.find(".remove-image-btn").on("click",function(d){d.preventDefault(),d.stopPropagation();const p=$(this).data("index"),m=$(this).data("field");confirm("Bạn có chắc chắn muốn xóa ảnh này?")&&removeImageFromPreview(m,p)}),f}function c(o,s){if(o===s)return!0;if(o==null||s==null||o.length!==s.length)return!1;const t=[...o].sort(),f=[...s].sort();for(let d=0;d<t.length;d++)if(t[d]!==f[d])return!1;return!0}})};window.actionForm=function(r){r.on("submit",function(n){n.preventDefault(),r=$(this);const l=r.attr("action"),u=r.find('input[name="_method"]').val();$.ajax({url:l,method:u,data:r.serialize(),success:function(i){const e=i.data;i.error?_.showError(e.message??"",1):sessionStorage.setItem("success",e.message??""),e.nextUrl!==void 0?window.location.href=e.nextUrl:window.location.reload()},error:function(i){_.showError(i.responseJSON.message,1)}})})};window.showError=function(r,n){return`
         <div class="toast align-items-center text-bg-danger border-0 show rounded-1" style="flex-basis: unset;font-size: 14px;display: none" role="alert" aria-live="assertive"
             aria-atomic="true" id="error-${n}">
            <div class="d-flex justify-content-between">
                <div class="toast-body">${r}</div>
                <button type="button" class="btn-close btn-close-white me-2 my-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function () {
                    $('#error-${n}').hide().fadeIn();
                }, 0);

                setTimeout(function () {
                    $('#error-${n}').remove()
                }, 3000)
            <\/script>
        </div>
    `};window.showSuccess=function(r,n){return`
         <div class="toast align-items-center text-bg-success border-0 show rounded-1" style="flex-basis: unset; font-size: 14px;display: none" role="alert" aria-live="assertive"
             aria-atomic="true" id="success-${n}">
            <div class="d-flex justify-content-between">
                <div class="toast-body">${r}</div>
                <button type="button" class="btn-close btn-close-white me-2 my-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function () {
                    $('#success-${n}').hide().fadeIn();
                }, 0);

                setTimeout(function () {
                    $('#success-${n}').remove()
                }, 3000)
            <\/script>
        </div>
    `};const S="modulepreload",C=function(h){return"/build/"+h},x={},v=function(r,n,l){let u=Promise.resolve();if(n&&n.length>0){let e=function(c){return Promise.all(c.map(o=>Promise.resolve(o).then(s=>({status:"fulfilled",value:s}),s=>({status:"rejected",reason:s}))))};document.getElementsByTagName("link");const a=document.querySelector("meta[property=csp-nonce]"),b=(a==null?void 0:a.nonce)||(a==null?void 0:a.getAttribute("nonce"));u=e(n.map(c=>{if(c=C(c),c in x)return;x[c]=!0;const o=c.endsWith(".css"),s=o?'[rel="stylesheet"]':"";if(document.querySelector(`link[href="${c}"]${s}`))return;const t=document.createElement("link");if(t.rel=o?"stylesheet":S,o||(t.as="script"),t.crossOrigin="",t.href=c,b&&t.setAttribute("nonce",b),document.head.appendChild(t),o)return new Promise((f,d)=>{t.addEventListener("load",f),t.addEventListener("error",()=>d(new Error(`Unable to preload CSS for ${c}`)))})}))}function i(e){const a=new Event("vite:preloadError",{cancelable:!0});if(a.payload=e,window.dispatchEvent(a),!a.defaultPrevented)throw e}return u.then(e=>{for(const a of e||[])a.status==="rejected"&&i(a.reason);return r().catch(i)})};document.addEventListener("DOMContentLoaded",async()=>{await Promise.all([v(()=>import("./script-CtZ6-JUN.js"),[]),v(()=>import("./button-action-BBpola57.js"),[]),v(()=>import("./table-BRE5mwnR.js"),[]),v(()=>import("./mode-CcC0JHxP.js"),[]),v(()=>import("./passwordJs-Bwj2e68P.js"),[]),v(()=>Promise.resolve().then(()=>k),void 0)])});const k=Object.freeze(Object.defineProperty({__proto__:null},Symbol.toStringTag,{value:"Module"}));
