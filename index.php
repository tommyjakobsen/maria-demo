<?php
include './db/db_connect.php';
include './classes/classSql.php';
$limit=20;

$newSql=new mySql();
 if(isset($_GET["type"]))
      {
      $type=$_GET["type"];
      }else{
       //default type is sort by population
      $type="Population";
      }
      

//Don't need a case, but adding it if I want different functionality inside in the future
switch ($type) {
    case "Population":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT $limit");
        break;
    case "LifeExpectancy":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT $limit");
        break;
    case "SurfaceArea":
        $result=$newSql->query("select * from country
        order by $type DESC
        LIMIT $limit");
        break;
}



if(!isset($result->num_rows))
{
  //Go to setup page....
  echo "<font color=red>Database not populated. Creation will start...</font>";
  echo "<meta http-equiv=\"refresh\" content=\"2;url=/setup.php\" />";
}else{
 
  $OUTPUT="";
  //Show the statistics
   
echo "<!DOCTYPE HTML>
<html>
<head>
";
 ?>
<script type="text/javascript">
(function(){(function(){function a(){if(void 0===b.dialogArguments)return navigator.cookieEnabled;document.cookie="__dTCookie=1";var a=-1!==document.cookie.indexOf("__dTCookie");document.cookie="__dTCookie=1; expires=Thu, 01-Jan-1970 00:00:01 GMT";return a}if(window.dT_)window.console&&window.console.log("Duplicate agent injection detected, turning off redundant initConfig.");else{var b="undefined"!==typeof window?window:self;a()&&(window.dT_||(window.dT_={cfg:"app=ee9749b4170737ac|cors=1|featureHash=A2SVfqru|reportUrl=https://bf35490ebv.bf.dynatrace.com/bf|rdnt=1|uxrgce=1|bp=2|cuc=d7q3fzv5|srms=1,1,,,|uxrgcm=100,25,300,3;100,25,300,3|dpvc=1|lastModification=1584093177020|dtVersion=10187200224105626|tp=500,50,0,1|uxdcw=1500|featureHash=A2SVfqru|agentUri=https://js-cdn.dynatrace.com/jstag/16ef46d461e/ruxitagent_A2SVfqru_10187200224105626.js|auto=|domain=|rid=RID_|rpid=|app=ee9749b4170737ac",
iCE:a}))}})();}).call(this);
(function(){(function(){function Ob(){return ta?new ta:ua?new ua("MSXML2.XMLHTTP.3.0"):d.XMLHttpRequest?new d.XMLHttpRequest:new d.ActiveXObject("MSXML2.XMLHTTP.3.0")}function Pb(){ua=ta=void 0}function u(){var a=0;try{a=d.performance.timing.navigationStart+Math.floor(d.performance.now())}catch(b){}return 0>=a||isNaN(a)||!isFinite(a)?(new Date).getTime():a}function R(a,b){function c(){delete la[g];a.apply(this,arguments)}for(var e=[],J=2;J<arguments.length;J++)e[J-2]=arguments[J];var g;"apply"in va?g=va.apply(d,
[c,b].concat(e)):g=va(c,b);la[g]=!0;return g}function $a(a){delete la[a];"apply"in ca?ca.call(d,a):ca(a)}function k(a){for(var b=[],c=1;c<arguments.length;c++)b[c-1]=arguments[c];a.push.apply(a,b)}function ab(a){k(da,a)}function Qb(a){for(var b=da.length;b--;)if(da[b]===a){da.splice(b,1);break}}function Rb(){return da}function Sb(a,b){return bb(a,b)}function Tb(a,b){a=new Ub([a],{type:b});return Vb(a)}function Wb(a,b){return cb?new cb(a,b):void 0}function Xb(a){"function"===typeof a&&k(db,a)}function Yb(){return db}
function Zb(){return Da}function eb(a){return function(){for(var b=[],c=0;c<arguments.length;c++)b[c]=arguments[c];if("number"!==typeof b[0]||!la[b[0]])try{return a.apply(this,b)}catch(e){return a(b[0])}}}function $b(){ma&&(d.clearTimeout=ca,d.clearInterval=Ea,ma=!1)}function ea(a,b){return isNaN(a)||isNaN(b)?0:Math.floor(Math.random()*(b-a+1))+a}function v(a,b){return parseInt(a,b||10)}function p(a,b,c){void 0===c&&(c=0);var e=-1;b&&a&&a.indexOf&&(e=a.indexOf(b,c));return e}function fb(a){return document.getElementsByTagName(a)}
function gb(a){var b=a.length;if("number"===typeof b)a=b;else{for(var b=0,c=2048;a[c-1];)b=c,c+=c;for(var e=7;1<c-b;)e=(c+b)/2,a[e-1]?b=e:c=e;a=a[e]?c:b}return a}function ac(a){a=encodeURIComponent(a);var b=[];if(a)for(var c=0;c<a.length;c++){var e=a.charAt(c);k(b,bc[e]||e)}return b.join("")}function S(a){if(!a)return"";var b=d.crypto||d.msCrypto;if(b){var c=new Int8Array(a);b.getRandomValues(c)}else for(c=[],b=0;b<a;b++)c.push(ea(0,32));a=[];for(b=0;b<c.length;b++){var e=Math.abs(c[b]%32);a.push(String.fromCharCode(e+
(9>=e?48:55)))}return a.join("")}function hb(){return!(!d.console||!d.console.log)}function cc(){try{dc.apply(d.parent,arguments)}catch(a){}}function ec(){try{fc.apply(d.top,arguments)}catch(a){}}function gc(a){var b=Array.prototype.slice.call(arguments,1);try{hc.apply(a,b)}catch(c){}}function ic(a){var b=Array.prototype.slice.call(arguments,1);try{jc.apply(a,b)}catch(c){}}function K(){return d.dT_}function kc(){return B}function lc(){return ib}function mc(){return jb}function nc(){return wa}function kb(){return"dtAdk"}
function oc(){return fa}function lb(a){-1<d.dT_.io(a,"^")&&(a=a.split("^^").join("^"),a=a.split("^dq").join('"'),a=a.split("^rb").join(">"),a=a.split("^lb").join("<"),a=a.split("^p").join("|"),a=a.split("^e").join("="),a=a.split("^s").join(";"),a=a.split("^c").join(","),a=a.split("^bs").join("\\"));return a}function pc(){return T}function qc(a){T=a}function mb(a){var b=d.dT_,c=b.scv("rid"),b=b.scv("rpid");c&&(a.rid=c);b&&(a.rpid=b)}function nb(a){if(a.xb){a=lb(a.xb);try{T=new RegExp(a)}catch(b){}}}
function ob(a){var b={};a=a.split("|");for(var c=0;c<a.length;c++){var e=a[c].split("=");2===e.length&&(b[e[0]]=decodeURIComponent(e[1].replace(/\+/g," ")))}return b}function Fa(){var a=n("csu");return(a.indexOf("dbg")===a.length-3?a.substr(0,a.length-3):a)+"_"+n("app")+"_Store"}function xa(a,b,c){b=b||{};a=a.split("|");for(var e=0;e<a.length;e++){var d=a[e],g=p(a[e],"=");-1===g?b[d]="1":(d=a[e].substring(0,g),b[d]=a[e].substring(g+1,a[e].length))}!c&&(c=b,a=c.spc)&&(e=document.createElement("textarea"),
e.innerHTML=a,c.spc=e.value);return b}function U(a){return a in f?f[a]:ya[a]}function l(a){a=U(a);return"false"===a||"0"===a?!1:!!a}function L(a){var b=v(U(a));isNaN(b)&&(b=ya[a]);return b}function n(a){return String(U(a)||"")}function rc(a,b){f[a]=b}function pb(a){return f=a}function qb(a){var b=location.hostname;return b&&a?b===a||-1!==b.indexOf("."+a,b.length-("."+a).length):!0}function Ga(a){f[a]=0>p(f[a],"#"+a.toUpperCase())?f[a]:""}function Ha(a){var b=a.agentUri;b&&-1<p(b,"_")&&(b=/([a-zA-Z]*)[0-9]{0,4}_([a-zA-Z_0-9]*)_[0-9]+/g.exec(b))&&
b.length&&2<b.length&&(a.csu=b[1],a.featureHash=b[2])}function Ia(a,b){qb(f.domain||"")||(f.domainOverride=location.hostname+","+f.domain,delete f.domain);f.pVO&&(a.pVO=f.pVO);b||(a.bp=a.bp||ya.bp,1===h&&a.bp1&&(a.bp=1),a.bp2&&(a.bp=2),4!==a.bp||d.JSON||(a.bp=1))}function sc(){return f}function C(a,b){try{var c=na;c&&c.setItem(a,b)}catch(e){}}function oa(a){try{var b=na;if(b)return b.getItem(a)}catch(c){}return null}function M(a){try{var b=na;b&&b.removeItem(a)}catch(c){}}function za(a,b){if(V()&&
(!K().A||rb))return a.apply(this,b||[])}function V(){return!l("coo")||l("cooO")||rb}function m(a){document.cookie=a+'="";path=/'+(n("domain")?";domain="+n("domain"):"")+"; expires=Thu, 01 Jan 1970 00:00:01 GMT;"}function sb(a,b,c){var e=1,d=0;do document.cookie=a+'=""'+(b?";domain="+b:"")+";path="+c.substr(0,e)+"; expires=Thu, 01 Jan 1970 00:00:01 GMT;",e=c.indexOf("/",e),d++;while(-1!==e&&5>d)}function N(a){var b=document.cookie;if(!b)return"";var c=a+"=";a=p(b,c);if(0>a)return"";for(;0<=a;)if(a&&
" "!==b.charAt(a-1)&&";"!==b.charAt(a-1))a=p(b,c,a+c.length);else return c=a+c.length,a=p(b,";",a),0<=a?b.substring(c,a):b.substr(c);return""}function tc(a,b,c,e){b||0===b?(b=(""+b).replace(/[;\n\r]/g,"_"),a=a+"="+b+";path=/"+(n("domain")?";domain="+n("domain"):""),c&&(a+=";expires="+c.toUTCString()),e&&(a+=";Secure"),document.cookie=a):m(a)}function D(a,b,c,e){za(tc,[a,b,c,e])}function pa(a){var b=/^[0-9A-Za-z_=:\$\+\/\.\-\*%\|]*$/.test(a);return a&&2<a.split("$").length?!1:b}function tb(){var a=
N(B);a||((a=oa(B))&&pa(a)?W(a):a="");return pa(a)?a:""}function W(a){D(B,a,void 0,l("ssc"))}function qa(a){return 32===a.length||12>=a.length?a:""}function ub(a){if(!isNaN(Number(a))){var b=v(a);if(-99<=b&&99>=b)return a}return""}function vb(a){var b={sessionId:"",b:""},c=p(a,"|"),e=a;-1!==c&&(e=a.substring(0,c));c=p(e,"$");-1!==c?(b.sessionId=qa(e.substring(c+1)),b.b=ub(e.substring(0,c))):b.sessionId=qa(e);return b}function wb(a){var b={sessionId:"",b:""};a=a.split("v"===a.charAt(0)?"_":"=");if(2<
a.length&&!(a.length%2)){var c=Number(a[1]);if(isNaN(c)||3>c)return b;for(var c={},e=2;e<a.length;e++)c[a[e]]=a[e+1],e++;c.sn?b.sessionId=qa(c.sn):b.sessionId="hybrid";c.srv&&(b.b=ub(c.srv));a=K();"1"!==c.ol||0<=p(navigator.userAgent,"RuxitSynthetic")||(C("dtDisabled","true"),a.disabled=!0,a.A=!0)}return b}function Ja(){return!l("dpvc")&&!l("pVO")}function ga(a){var b=document.cookie?document.cookie.split(a+"=").length-1:0;if(1<b){var c=n("domain")||d.location.hostname,e=d.location.hostname,J=d.location.pathname,
g=0,f=0;w.push(a);do{var h=e.substr(g);if(h!==c||"/"!==J){sb(a,h===c?"":h,J);var k=document.cookie?document.cookie.split(a+"=").length-1:0;k<b&&(w.push(h),b=k)}g=e.indexOf(".",g)+1;f++}while(g&&10>f&&1<b);n("domain")&&1<b&&sb(a,"",J)}}function uc(){ga(fa);ga(B);ga(wa);ga("rxvt");ab(function(a,b,c,e){0<w.length&&!b&&(a.av(e,0,"dCN",function(){return w.join(",")}),a.av(e,4,"duplicateCookieNames",function(){return w.slice()}),w=[])})}function vc(){return ha}function Aa(a,b,c,e,d){var g=document.createElement("script");
g.setAttribute("src",a);b&&g.setAttribute("defer","true");c&&(g.onload=c);e&&(g.onerror=e);d&&g.setAttribute("id",d);g.setAttribute("crossorigin","anonymous");a=document.getElementsByTagName("script")[0];a.parentElement.insertBefore(g,a)}function Ka(a,b){return La+"/"+(b||X)+"_"+a+"_"+(L("buildNumber")||K().version)+".js"}function Ma(a,b){try{d.localStorage&&d.localStorage.setItem(a,b)}catch(c){}}function Na(a){try{if(d.localStorage)return d.localStorage.getItem(a)}catch(b){}return null}function E(a){try{d.localStorage&&
d.localStorage.removeItem(a)}catch(b){}}function xb(a){if(a=a||tb()){var b=a.charAt(0);return"v"===b||"="===b?wb(a):vb(a)}return{sessionId:"",b:""}}function ia(a){return xb(a).b}function ja(a){return xb(a).sessionId}function yb(a,b){b=r(b);for(var c=!1,e=0;e<b.length;e++)b[e].frameId===ha&&(b[e].g=a,c=!0);c||k(b,{frameId:ha,g:a});Y(b)}function Y(a,b,c){if(a){var e=0===h;var d=[];for(var g=0;g<a.length;g++)if("-"!==a[g].g){0<g&&0<d.length&&k(d,"p");var f=x;f&&(k(d,f),k(d,"$"));k(d,a[g].frameId);k(d,
"h");k(d,a[g].g)}e&&!d.length&&(Oa&&(O(0,!0,"a"),Pa(!1)),x=ia()||"",k(d,x),k(d,"$"),k(d,ha),k(d,"h-"));a=e?b||Qa():F();if(e||a)k(d,"v"),k(d,a),e="undefined"!==typeof c?c:t(),0<=e&&(k(d,"e"),k(d,e));d=d.join("")}else d="";d||0!==h||(Oa&&(O(0,!0,"a"),Pa(!1)),x=ia()||"",c="undefined"!==typeof c?c:t(),d=x+"$"+ha+"h-v"+(b||Qa()+(0<=c?"e"+c:"")));D(fa,d||"-",void 0,l("ssc"))}function r(a){var b=N(fa),c=[];if(b&&"-"!==b){for(var b=b.split("p"),d="",f=null,g=0;g<b.length;g++){var h=b[g],n=p(h,"h"),l=p(h,
"v"),m=p(h,"e"),y=h.substring(p(h,"$")+1,n),n=-1!==l?h.substring(n+1,l):h.substring(n+1),d=d||-1!==l?-1!==m?h.substring(l+1,m):h.substring(l+1):"",f=f||-1!==m?h.substring(m+1):null;(h=a)||(h=v(y.split("_")[0]),l=u()%Ra,l<h&&(l+=Ra),h=h+9E5>l);h&&k(c,{frameId:y,g:"-"===n?"-":v(n)})}for(g=0;g<c.length;g++)c[g].visitId=d||"",c[g].j=null!==f?v(f):-1}return c}function Qa(){return F()||O(0,!0,"c")}function F(){var a=r(!0);return Z()<=u()?"":(ka(!1),1<=a.length?-1!==t()&&2<=L(Sa)&&a[0].j>=L(wc)?O(0,!0,"e"+
a[0].j,!0):a[0].visitId||"":P(G)||"")}function ka(a){var b=u(),c=zb().m;a&&(c=b);Ab(b+Bb+"|"+c);Cb()}function Db(a,b,c){if(c&&(c=r(!0),(c=1<=c.length?c[0].visitId||"":P(G)||"")&&(c=/([A-Z]+)-([0-9]+)/g.exec(c))&&3===c.length&&isFinite(Number(c[2]))))return a=c[1]+"-"+(Number(c[2])+1),Eb(a,b),a;a||(a=ea(1,1E6));c=ja()||"";c||(c=(0===h?-1*ea(Fb,Gb)+"$":"")+S(32),W(c),c=ja(c)||"");a=""+a;for(var d=a.length,f=[],g=0;g<c.length;g++)f[g]=String.fromCharCode(65+Math.abs((c.charCodeAt(g)^a.charCodeAt(g%d))%
26));f.push("-0");a=f.join("");Eb(a,b);return a}function Ta(a){var b=r(!1),c=2<=L(Sa)?0:-1;Y(b,a,c);Q(G,a);Q(aa,String(c));ka(!0)}function O(a,b,c,d){b&&(ba=!0);a=Db(u(),c,d);Ta(a);return a}function Eb(a,b){for(var c=0;c<Ua.length;c++)Ua[c](a,ba,b)}function xc(a){Ua.push(a)}function Cb(){Va&&$a(Va);Va=R(Hb,Z()-u())}function Hb(){if(Z()<=u()&&V()){var a=u(),a=Db(a,"t"+(a-Z()));Ta(a);return!0}Ba(Cb);return!1}function Ab(a){D("rxvt",a,void 0,l("ssc"));Q("rxvt",a)}function Q(a,b){Ja()?(Ma(a,b),M(a)):
(C(a,b),E(a))}function Ib(){var a=N("rxvt");a||(a=P("rxvt")||"");return a}function Jb(){var a=F()||"";Q(G,a);a=Ib();Ab(a)}function zb(){var a={v:0,m:0},b=Ib();if(b)try{var c=b.split("|");2===c.length&&(a.v=parseInt(c[0],10),a.m=parseInt(c[1],10))}catch(e){}return a}function Z(){var a=zb();return Math.min(a.v,a.m+Kb)}function yc(a){Bb=a}function Pa(a){void 0===a&&(a=!0);Oa=a}function zc(){var a=ba;ba=!1;return a}function Ac(){Hb()||ka(!1)}function Bc(){if(0===h&&-1!==t()&&2<=L(Sa)){var a=r(!1),b=t()+
1;Y(a,"",b);Q(aa,String(b))}}function P(a){var b=Na(a);b||(b=oa(a));return b}function t(){var a=r(!0);if(1<=a.length&&!isNaN(a[0].j))return a[0].j;a=P(aa)||"-1";a=v(a);return isNaN(a)?-1:a}function Ba(a){V()?a():(q||(q=[]),k(q,a))}function Cc(a){return za(a)}function Dc(){for(var a=0;a<q.length;a++)R(q[a],0);q=[];f.cooO=!0}function Ec(){f.cooO=!1;m(B);m(fa);m(wa);m("dtSa");m(kb());0===h&&(m("rxVisitor"),m("rxvt"));try{Ja()?(E(aa),E(G)):(M(aa),M(G));var a=na;a&&(0===h&&a.removeItem("rxVisitor"),a.removeItem(B),
a.removeItem("rxvt"));(a=Wa)&&a.removeItem(Fa())}catch(b){}}function Fc(){return x}function Gc(){Ba(function(){ja()||W((0===h?-1*ea(Fb,Gb)+"$":"")+S(32));x=ia()||""})}function Xa(){var a=N("rxVisitor");if(!a||a.length&&a.length!==Ya)a=Na("rxVisitor")||oa("rxVisitor"),a&&a.length===Ya||(Lb=!0,a=u()+"",a+=S(Ya-a.length));var b=a;if(Ja()){var c=new Date;c.setFullYear(c.getFullYear()+2);Ma("rxVisitor",b)}else C("rxVisitor",b);D("rxVisitor",b,c,l("ssc"));return a}function Hc(){return Lb}function Ic(a){var b=
N("rxVisitor");m("rxVisitor");M("rxVisitor");E("rxVisitor");D("rxVisitor",b);f.pVO=!0;a&&Ma(Za,"1");Jb()}function Jc(){E(Za);l("pVO")&&(f.pVO=!1,Xa());Jb()}function Kc(){var a=0;try{a=Math.floor(d.performance.now())}catch(b){}return 0>=a||isNaN(a)||!isFinite(a)?(new Date).getTime()-Mb():a}function Mb(){var a=0;try{a=Math.floor(d.performance.B)}catch(c){}if(0>=a||isNaN(a)||!isFinite(a)){var a=d.dT_,b=0;try{b=d.performance.timing.navigationStart}catch(c){}a=0>=b||isNaN(b)||!isFinite(b)?a.gAST():b}return a}
function Lc(){var a=d.dT_;d.dT_={version:"10187200224105626",cfg:a?a.cfg:"",iCE:a?a.iCE:function(){return navigator.cookieEnabled},ica:1,disabled:!1,A:!1,gx:Ob,cx:Pb,mp:cc,mtp:ec,mi:gc,mw:ic,gAST:Zb,ww:Wb,stu:Tb,nw:u,apush:k,st:R,si:Sb,aBPSL:ab,rBPSL:Qb,gBPSL:Rb,aBPSCC:Xb,gBPSCC:Yb,buildType:0===h?"dynatrace":"appmon",gSSV:oa,sSSV:C,rSSV:M,rvl:E,pn:v,iVSC:pa,p3SC:wb,pLSC:vb,io:p,dC:m,sC:D,esc:ac,gSId:ia,gDtc:ja,gSC:tb,sSC:W,gC:N,cRN:ea,cRS:S,gEL:gb,gEBTN:fb,gSCN:kc,gPCHN:lc,gRHN:mc,gPCCN:oc,gLCN:nc,
gMSIDCN:kb,cfgO:sc,pCfg:ob,pCSAA:xa,cFHFAU:Ha,sCD:Ia,bcv:l,ncv:L,scv:n,stcv:rc,rplC:pb,cLSCK:Fa,gFId:vc,gBAU:Ka,iS:Aa,eWE:Ba,oEIE:Cc,oEIEWA:za,eA:Dc,dA:Ec,gcSId:Fc,iNV:Hc,gVID:Xa,dPV:Ic,ePV:Jc,sVIdUP:Pa,sVTT:yc,sVID:Ta,rVID:F,gVI:Qa,gNVId:O,gARnVF:zc,cAUV:Ac,uVT:ka,aNVL:xc,gPC:r,cPC:yb,sPC:Y,clB:$b,ct:$a,aRI:mb,iXB:nb,gXBR:pc,sXBR:qc,de:lb,cCL:hb,gEC:t,iEC:Bc,rnw:Kc,gto:Mb}}var H=window;if(!H.dT_||!H.dT_.cfg||"string"!=typeof H.dT_.cfg||H.dT_.initialized)H.console&&H.console.log("Initconfig not found or agent already initialized! This is an injection issue.");
else if(!(navigator.userAgent&&0<=navigator.userAgent.indexOf("RuxitSynthetic"))){var d="undefined"!==typeof window?window:self,ta,ua,da,db=[],Da,Wa,na,la={},bc=new (function(){return function(){this["!"]="%21";this["~"]="%7E";this["*"]="%2A";this["("]="%28";this[")"]="%29";this["'"]="%27";this.$="%24";this[";"]="%3B";this[","]="%2C"}}()),va,bb,hc=d.postMessage,cb=d.Worker,Ub=d.Blob,Vb=d.URL&&d.URL.createObjectURL,jc=d.Worker&&d.Worker.prototype.postMessage,dc=d.parent.postMessage,fc=d.top.postMessage,
ca,Ea,ma=!1,h,ya,fa="dtPC",B="dtCookie",ib="x-dtpc",jb="x-dtreferer",wa="dtLatC",T,f={},rb=!!navigator.userAgent&&0<=navigator.userAgent.indexOf("RuxitSynthetic"),w=[],ha,Ra=6E8,Nb,La,X,Mc={childList:!0,subtree:!0,attributes:!0,attributeOldValue:!0},Nc=["_DT_RENDERING_"],wc="mel",Sa="vs",aa="rxec",G="rxvisitid",Va,Bb=18E5,Kb=216E5,ba=!1,Ua=[],Oa=!1,q=[],Fb=2,Gb=21,x,Za="dt-pVO",Ya=45,Lb=!1;if(!function(a){try{h=a;var b=d.dT_;ta=d.XMLHttpRequest;ua=d.ActiveXObject;va=d.setTimeout;bb=d.setInterval;
ma||(ca=d.clearTimeout,Ea=d.clearInterval);if(!((b.iCE?b.iCE():navigator.cookieEnabled)&&("complete"!==document.readyState||d.performance&&d.performance.timing)))return!1;Lc();try{Wa=d.localStorage,na=d.sessionStorage}catch(Ca){}Da=u();da=[];la={};ma||(d.clearTimeout=eb(ca),d.clearInterval=eb(Ea),ma=!0);ha=Da%Ra+"_"+v(ea(0,1E3)+"");ya={ade:"",aew:!0,agentLocation:"",agentname:"",agentUri:"",uana:"data-dtname,data-dtName",app:"",async:!1,auto:!1,bandwidth:"300",bp1:!1,bp2:!1,bp:0===h?1:2,bs:!1,buildNumber:0,
coo:!1,cooO:!1,cors:!1,csu:"",cuc:"",cux:!1,dataDtConfig:"",debugName:"",dASXH:0!==h,disableCookieManager:!1,disableLogging:!1,dmo:!1,dpvc:!1,disableXhrFailures:!1,domain:"",domainOverride:"",doNotDetect:"",ds:!0,dsndb:!1,dsss:!1,eni:!1,euf:!1,evl:"",extblacklist:"",exteventsoff:!1,fa:!1,fau:!0,featureHash:"",ffi:!1,hvt:216E5,lastModification:0,imm:!1,initializedModules:"",ign:"",instr:"",iub:"",lab:!1,legacy:!1,lmut:!0,lzwd:!1,lzwe:!1,mb:"",md:"",mdp:"",mdl:"",mdn:5E3,mel:200,mepp:10,moa:30,mrt:3,
mpl:0===h?1024:100,mmds:2E4,msl:3E4,mhl:4E3,name:"",ncw:!1,ntd:!1,oat:180,ote:!1,perfbv:1,prfSmpl:0,pt:!0,pui:!1,pVO:!1,raxeh:!0,rdnt:0,reportUrl:"dynaTraceMonitor",restoreTimeline:!1,rid:"",ridPath:"",rpid:"",rt:0===h?1E4:0,rtl:0===h?0:100,rtp:0===h?2:1,rtt:1E3,rtu:200,rx_visitID:"",sl:100,sosi:!1,spc:"",srbbv:1,srbw:!0,srad:!0,srmr:100,srms:"1,1,,,",srsr:1E5,srtbv:3,srtd:1,srtr:500,srvr:"",srwo:!1,ssc:!1,st:3E3,svNB:!1,syntheticConfig:!1,tal:0,tp:"500,50,3",tt:100,tvc:3E3,uam:!1,useNewCookies:!1,
uxdce:!1,uxdcw:1500,uxrgce:!0,uxrgcm:"100,25,300,3;100,25,300,3",vcfi:0===h,vcit:1E3,vct:50,vcv:1,vcx:50,vs:1,WST:!1,xb:"",xmut:!0,xt:0};a:{var c=K().cfg;f={reportUrl:"dynaTraceMonitor",initializedModules:"",csu:"dtagent",dataDtConfig:"string"===typeof c?c:""};K().cfg=f;0===h&&(f.csu="ruxitagentjs");var e=f.dataDtConfig;e&&-1===p(e,"#CONFIGSTRING")&&(xa(e,f),Ga("domain"),Ga("auto"),Ga("app"),Ha(f));var k=fb("script"),g=gb(k),m=-1===p(f.dataDtConfig||"","#CONFIGSTRING")?f:null;if(0<g)for(a=0;a<g;a++)b:{var b=
void 0,r=k[a],c=m;if(r.attributes){var x=f.csu+"_bootstrap.js",e=/.*\/jstag\/.*\/.*\/(.*)_bs(_dbg)?.js$/,D=c,y=r.src,w=y&&y.indexOf(x),E=r.attributes.getNamedItem("data-dtconfig");if(E){var t=y,G=E.value,z={};f.legacy=!0;if(t){var q=/([a-zA-Z]*)[0-9]{0,4}_([a-zA-Z_0-9]*)_([0-9]+)/g.exec(t);q&&q.length&&(z.csu=q[1],z.featureHash=q[2],0===h&&(z.agentLocation=t.substr(0,p(t,q[1])-1),z.buildNumber=q[3]))}G&&xa(G,z,!0);qb(z.domain)||(z.domainOverride=location.hostname+","+z.domain,delete z.domain);b=z;
if(!c)D=b;else if(!b.syntheticConfig){m=b;break b}}b||(b=f);if(w&&0<=w){var H=w+x.length+5;b.app=y.length>H?y.substr(H):"Default%20Application"}else if(y){var M=e.exec(y);M&&(b.app=M[1])}m=D}else m=c}if(m)for(var O in m)m.hasOwnProperty(O)&&(k=O,f[k]=m[k]);if(f.rx_visitID){var Q=f.rx_visitID;Q&&(K().rx_visitID=Q)}var aa=Fa();try{var S=(m=Wa)&&m.getItem(aa);if(S){var ra=ob(S),A=xa(ra.config||""),C=f.lastModification||"0",W=v((A.lastModification||ra.lastModification||"0").substr(0,13)),ga="string"===
typeof C?v(C.substr(0,13)):C;if(!C||W>=ga)if(A.agentname=ra.name,A.agentUri?Ha(A):(A.csu=ra.name,A.featureHash=ra.featureHash),Ia(A,!0),nb(A),mb(A),W>(f.lastModification||0)){var ia=l("auto"),ja=l("legacy");f=pb(A);f.auto=ia;f.legacy=ja}}}catch(Ca){}Ia(f);try{var Y=f.ign;if(Y&&(new RegExp(Y)).test(d.location.href)){document.dT_=d.dT_=void 0;var sa=!1;break a}}catch(Ca){}f.useNewCookies&&0===h&&(fa="rxpc",B="rxsession",wa="rxlatency",ib="x-rxpc",jb="x-rxreferer");sa=!0}if(!sa)return!1;uc();try{Nb=
K().disabled||!!oa("dtDisabled")}catch(Ca){}var F;if(!(F=n("agentLocation")))a:{var Z=n("agentUri");if(Z||document.currentScript){var I=Z||document.currentScript.src;if(I){var ka=-1===p(I,"_bs")&&-1===p(I,"_bootstrap")&&-1===p(I,"_complete")?1:2,P=I.lastIndexOf("/");for(sa=0;sa<ka&&-1!==P;sa++)I=I.substr(0,P),P=I.lastIndexOf("/");F=I;break a}}var ba=location.pathname;F=ba.substr(0,ba.lastIndexOf("/"))}La=F;X=n("agentname")||n("csu")||(0===h?"ruxitagentjs":"dtagent");"true"===N("dtUseDebugAgent")?
0>X.indexOf("dbg")&&(X=n("debugName")||X+"dbg"):X=n("name")||X;if(!l("auto")&&!l("legacy")&&!Nb){var R=n("agentUri")||Ka(n("featureHash")),T;if(!(T=l("async")||"complete"===document.readyState)){var U=d.navigator.userAgent,V=U.indexOf("MSIE ");T=0<V?9>=parseInt(U.substring(V+5,U.indexOf(".",V)),10):!1}T?Aa(R,l("async"),void 0,void 0,"dtjsagent"):(document.write('<script id="dtjsagentdw" type="text/javascript" src="'+R+'">\x3c/script>'),document.getElementById("dtjsagentdw")||Aa(R,l("async"),void 0,
void 0,"dtjsagent"))}var pa=d.location.href;0===h&&-1!==p(pa,"_DT_RENDERING_")&&(K().RMOD={conf:Mc,ignore:Nc,ID:"_DT_RENDERING_"},La&&Aa(Ka("R"),!0,void 0,void 0,"dtjsagent"));N(B)&&(f.cooO=!0);Gc();if(0===h){var qa=!!Na(Za);f.pVO=qa;Ba(Xa)}0===h&&L("hvt")&&(Kb=L("hvt"));za(yb,[1])}catch(Ca){return!1}return!0}(0)){try{delete d.dT_}catch(a){d.dT_=void 0}hb()&&d.console.log("JsAgent initCode initialization failed!")}}})();}).call(this);

</script>



<?php echo "<script type=\"text/javascript\">
  window.onload = function () {
    var chart = new CanvasJS.Chart(\"chartContainer\", {

      title:{
        text: \"Top ".$result->num_rows." $type for Countries in the World back in the days\"
      },
      data: [//array of dataSeries
        { //dataSeries object

         /*** Change type \"column\" to \"bar\", \"area\", \"line\" or \"pie\"***/
         type: \"column\",
         dataPoints: [
        ";
        $rowcount=0;
        while($row = $result->fetch_assoc()) {
        $rowcount++;
        if($rowcount < $result->num_rows)
                {
                echo "{ label: \"$row[Name]\", y: $row[$type] },\n";
                }else{
                echo "{ label: \"$row[Name]\", y: $row[$type] }\n";

                }
$OUTPUT.="<tr><td>$row[Name]</td><td>$row[Continent]</td><td>$row[Population]</td><td>$row[LifeExpectancy]</td><td>$row[GovernmentForm]</td><td>$row[HeadOfState]</td></tr>\n";
        }



echo "        ]
       }
       ]
     });

    chart.render();
  }
  </script>
  <script type=\"text/javascript\" src=\"https://canvasjs.com/assets/script/canvasjs.min.js\"></script>
</head>
<body bgcolor='#eeeeee'>";
echo "<center><FORM action='./index.php' method=GET>";
$counter=0;
echo "<select name='type' onchange='this.form.submit()'>";
 echo "<option value='' selected>Select report...</option>";
echo "<option value='Population'>Population</option>";
echo "<option value='LifeExpectancy'>LifeExpectancy</option>";
echo "<option value='SurfaceArea'>SurfaceArea</option>";
echo "</select>";
echo "</form>";
echo "<br></center>";
echo "<div id=\"chartContainer\" style=\"height: 300px; width: 100%;\">
  </div>
  ";
  echo "<table width=100% border=1 cellspacing=0>";
  echo "<tr><th bgcolor='#abcdef'>Name</th><th bgcolor='#abcdef'>Continent</th><th bgcolor='#abcdef'>Population</th><th bgcolor='#abcdef'>Life Exp.</th><th bgcolor='#abcdef'>Government Form</th><th bgcolor='#abcdef'>Head of State</th></tr>\n";
  echo "$OUTPUT";
  echo "</table>";
  echo "
</body>
</html>";
}





?>
