import{_ as c}from"./AppLayout-24207452.js";import p from"./DeleteUserForm-17a72ccf.js";import l from"./LogoutOtherBrowserSessionsForm-7c9050b1.js";import{S as s}from"./SectionBorder-fe443de6.js";import f from"./TwoFactorAuthenticationForm-100eca31.js";import u from"./UpdatePasswordForm-2f9695e4.js";import _ from"./UpdateProfileInformationForm-c177b7aa.js";import{c as d,w as n,o,a as i,e as r,b as t,f as a,F as h}from"./app-b2b60f1a.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-2bc3afc3.js";import"./SectionTitle-5f44f2c8.js";import"./DangerButton-8aed29b8.js";import"./TextInput-a15b6bd2.js";import"./SecondaryButton-6f373c1f.js";import"./ActionMessage-ba17adb9.js";import"./PrimaryButton-ef4e4954.js";import"./InputLabel-03270e58.js";import"./FormSection-de22bcad.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};