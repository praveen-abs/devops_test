import{I as o,aj as f,ai as Z,o as l,c as t,d as a,a as i,F as b,f as m,n as d,t as H,b as k,w as x,T as A}from"./toastservice.esm-918560db.js";import{S}from"./Service-ff2a1406.js";import{a as I}from"./index-362795f3.js";const R="/build/assets/ABS_small_logo_yellow-e2f94255.png",B="/build/assets/ABS_logo_Yellow-7e4e368e.png",O={class:"w-full"},P={key:0,src:R,class:"px-auto h-6 w-8 animate-bounce",alt:""},E={key:1,src:B,class:"h-8 w-[180px]",alt:""},F={key:0,class:""},D=["onClick"],$={width:"14",height:"14",class:"mx-2",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},z=["d"],T=["d"],j=["d"],U=["d"],N=["d"],q=["onClick","href"],G={width:"15",height:"15",class:"mx-2",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},Q=["d"],W=["d"],Y=["d"],J=["d"],K=["d"],X={key:0},C1={key:0,class:"text-white w-full rounded shadow-lg p-2"},e1=["href"],i1={__name:"Sidebar",setup(l1){const _=S();o(!0);const n=o(!1);o(!1),o(!1),o(!1);const v=o(),u=o(null),p=o(null),g=C=>{u.value=u.value===C?null:C,p.value=u.value},h=C=>u.value===C,s=o(!1),w=()=>{s.value=!s.value,n.value=!n.value},V=C=>{window.location.replace(window.location.origin+"/"+C)},y=o();return f(()=>{y.value=window.location.origin,console.log(window.location.origin),I.get("/currentUserRole").then(C=>{console.log("current logined user"+C.data),v.value=[{label:"Dashboard",to:"./",icon:"M0 2.57143C0 1.88944 0.270918 1.23539 0.753154 0.753154C1.23539 0.270918 1.88944 0 2.57143 0H7.71429C8.39627 0 9.05032 0.270918 9.53256 0.753154C10.0148 1.23539 10.2857 1.88944 10.2857 2.57143V7.71429C10.2857 8.39627 10.0148 9.05032 9.53256 9.53256C9.05032 10.0148 8.39627 10.2857 7.71429 10.2857H2.57143C1.88944 10.2857 1.23539 10.0148 0.753154 9.53256C0.270918 9.05032 0 8.39627 0 7.71429V2.57143ZM13.7143 2.57143C13.7143 1.88944 13.9852 1.23539 14.4674 0.753154C14.9497 0.270918 15.6037 0 16.2857 0H21.4286C22.1106 0 22.7646 0.270918 23.2468 0.753154C23.7291 1.23539 24 1.88944 24 2.57143V7.71429C24 8.39627 23.7291 9.05032 23.2468 9.53256C22.7646 10.0148 22.1106 10.2857 21.4286 10.2857H16.2857C15.6037 10.2857 14.9497 10.0148 14.4674 9.53256C13.9852 9.05032 13.7143 8.39627 13.7143 7.71429V2.57143ZM0 16.2857C0 15.6037 0.270918 14.9497 0.753154 14.4674C1.23539 13.9852 1.88944 13.7143 2.57143 13.7143H7.71429C8.39627 13.7143 9.05032 13.9852 9.53256 14.4674C10.0148 14.9497 10.2857 15.6037 10.2857 16.2857V21.4286C10.2857 22.1106 10.0148 22.7646 9.53256 23.2468C9.05032 23.7291 8.39627 24 7.71429 24H2.57143C1.88944 24 1.23539 23.7291 0.753154 23.2468C0.270918 22.7646 0 22.1106 0 21.4286V16.2857ZM13.7143 16.2857C13.7143 15.6037 13.9852 14.9497 14.4674 14.4674C14.9497 13.9852 15.6037 13.7143 16.2857 13.7143H21.4286C22.1106 13.7143 22.7646 13.9852 23.2468 14.4674C23.7291 14.9497 24 15.6037 24 16.2857V21.4286C24 22.1106 23.7291 22.7646 23.2468 23.2468C22.7646 23.7291 22.1106 24 21.4286 24H16.2857C15.6037 24 14.9497 23.7291 14.4674 23.2468C13.9852 22.7646 13.7143 22.1106 13.7143 21.4286V16.2857Z"},C.data==2||C.data==4?{label:"CRM",subItems:[{label:"Vendor",to:""},{label:"Client",to:""}],icon:"M13.3974 1.09016C13.3191 0.778666 13.139 0.502244 12.8857 0.30475C12.6324 0.107256 12.3204 0 11.9993 0C11.6781 0 11.3661 0.107256 11.1128 0.30475C10.8595 0.502244 10.6794 0.778666 10.6011 1.09016L10.5006 1.5192C10.4383 1.76854 10.3104 1.99665 10.1301 2.17988C9.94993 2.3631 9.72395 2.49476 9.47568 2.56119C9.22741 2.62762 8.96588 2.6264 8.71824 2.55766C8.4706 2.48892 8.24586 2.35516 8.06736 2.17027L7.76733 1.85373C7.54407 1.62305 7.25013 1.47358 6.93221 1.42905C6.61428 1.38453 6.29059 1.44751 6.01255 1.60799C5.73452 1.76847 5.51807 2.01725 5.39759 2.31481C5.27711 2.61237 5.25951 2.94166 5.34758 3.25037L5.4676 3.67642C5.53921 3.9245 5.5428 4.18727 5.478 4.43722C5.4132 4.68716 5.2824 4.91509 5.09928 5.09714C4.91616 5.27918 4.68747 5.40865 4.43714 5.47197C4.18682 5.5353 3.92407 5.53016 3.67642 5.45709L3.25037 5.33558C2.94166 5.24751 2.61237 5.26511 2.31481 5.38559C2.01725 5.50607 1.76847 5.72251 1.60799 6.00055C1.44751 6.27859 1.38453 6.60228 1.42905 6.92021C1.47358 7.23813 1.62305 7.53207 1.85373 7.75533L2.17027 8.05536C2.35835 8.23349 2.4949 8.45905 2.56554 8.70829C2.63618 8.95752 2.63828 9.22119 2.57163 9.47152C2.50498 9.72185 2.37204 9.94956 2.18682 10.1307C2.0016 10.3118 1.77096 10.4396 1.5192 10.5006L1.09016 10.6071C0.778666 10.6854 0.502244 10.8655 0.30475 11.1188C0.107256 11.3721 0 11.6841 0 12.0052C0 12.3264 0.107256 12.6384 0.30475 12.8917C0.502244 13.145 0.778666 13.3251 1.09016 13.4034L1.5192 13.5009C1.76854 13.5632 1.99665 13.6911 2.17988 13.8714C2.3631 14.0516 2.49476 14.2775 2.56119 14.5258C2.62762 14.7741 2.6264 15.0356 2.55766 15.2833C2.48892 15.5309 2.35516 15.7556 2.17027 15.9341L1.85373 16.2342C1.62305 16.4574 1.47358 16.7514 1.42905 17.0693C1.38453 17.3872 1.44751 17.7109 1.60799 17.9889C1.76847 18.267 2.01725 18.4834 2.31481 18.6039C2.61237 18.7244 2.94166 18.742 3.25037 18.6539L3.67642 18.5339C3.92341 18.4632 4.18481 18.46 4.43352 18.5244C4.68222 18.5888 4.90916 18.7185 5.09082 18.9002C5.27248 19.0818 5.40224 19.3088 5.46664 19.5575C5.53104 19.8062 5.52775 20.0676 5.45709 20.3146L5.33558 20.7391C5.24751 21.0478 5.26511 21.3771 5.38559 21.6747C5.50607 21.9723 5.72251 22.221 6.00055 22.3815C6.27859 22.542 6.60228 22.605 6.92021 22.5604C7.23813 22.5159 7.53207 22.3664 7.75533 22.1358L8.05536 21.8192C8.2342 21.6312 8.46055 21.4949 8.71046 21.4249C8.96037 21.3549 9.22456 21.3537 9.47509 21.4215C9.72561 21.4893 9.95317 21.6235 10.1337 21.8099C10.3142 21.9964 10.441 22.2282 10.5006 22.4808L10.6071 22.9098C10.6854 23.2213 10.8655 23.4978 11.1188 23.6952C11.3721 23.8927 11.6841 24 12.0052 24C12.3264 24 12.6384 23.8927 12.8917 23.6952C13.145 23.4978 13.3251 23.2213 13.4034 22.9098L13.5009 22.4808C13.5632 22.2315 13.6911 22.0033 13.8714 21.8201C14.0516 21.6369 14.2775 21.5052 14.5258 21.4388C14.7741 21.3724 15.0356 21.3736 15.2833 21.4423C15.5309 21.5111 15.7556 21.6448 15.9341 21.8297L16.2342 22.1463C16.4574 22.3769 16.7514 22.5264 17.0693 22.5709C17.3872 22.6155 17.7109 22.5525 17.9889 22.392C18.267 22.2315 18.4834 21.9828 18.6039 21.6852C18.7244 21.3876 18.742 21.0583 18.6539 20.7496L18.5339 20.3236C18.4632 20.0766 18.46 19.8152 18.5244 19.5665C18.5888 19.3178 18.7185 19.0908 18.9002 18.9092C19.0818 18.7275 19.3088 18.5978 19.5575 18.5334C19.8062 18.469 20.0676 18.4723 20.3146 18.5429L20.7391 18.6644C21.0478 18.7525 21.3771 18.7349 21.6747 18.6144C21.9723 18.4939 22.221 18.2775 22.3815 17.9994C22.542 17.7214 22.605 17.3977 22.5604 17.0798C22.5159 16.7619 22.3664 16.4679 22.1358 16.2447L21.8192 15.9446C21.6316 15.7657 21.4957 15.5395 21.4259 15.2898C21.3561 15.0401 21.355 14.7762 21.4228 14.5259C21.4906 14.2756 21.6246 14.0483 21.8108 13.8679C21.997 13.6875 22.2285 13.5607 22.4808 13.5009L22.9098 13.3944C23.2213 13.3161 23.4978 13.136 23.6952 12.8827C23.8927 12.6294 24 12.3174 24 11.9963C24 11.6751 23.8927 11.3631 23.6952 11.1098C23.4978 10.8565 23.2213 10.6764 22.9098 10.5981L22.4808 10.5006C22.2315 10.4383 22.0033 10.3104 21.8201 10.1301C21.6369 9.94993 21.5052 9.72395 21.4388 9.47568C21.3724 9.22741 21.3736 8.96588 21.4423 8.71824C21.5111 8.4706 21.6448 8.24586 21.8297 8.06736L22.1463 7.76733C22.3769 7.54407 22.5264 7.25013 22.5709 6.93221C22.6155 6.61428 22.5525 6.29059 22.392 6.01255C22.2315 5.73452 21.9828 5.51807 21.6852 5.39759C21.3876 5.27711 21.0583 5.25951 20.7496 5.34758L20.3236 5.4676C20.0767 5.53812 19.8155 5.54137 19.567 5.47702C19.3185 5.41268 19.0917 5.28307 18.9101 5.10162C18.7285 4.92017 18.5987 4.69347 18.5341 4.445C18.4696 4.19653 18.4726 3.93532 18.5429 3.68842L18.6644 3.26237C18.7525 2.95366 18.7349 2.62438 18.6144 2.32681C18.4939 2.02925 18.2775 1.78047 17.9994 1.61999C17.7214 1.45951 17.3977 1.39653 17.0798 1.44105C16.7619 1.48558 16.4679 1.63505 16.2447 1.86574L15.9446 2.18227C15.7656 2.36994 15.5393 2.50579 15.2895 2.57548C15.0397 2.64516 14.7757 2.6461 14.5254 2.57819C14.2751 2.51027 14.0478 2.37603 13.8675 2.18964C13.6871 2.00324 13.5605 1.77161 13.5009 1.5192L13.3974 1.09016ZM12.0008 19.5015C10.5172 19.5015 9.06705 19.0616 7.83356 18.2374C6.60006 17.4132 5.63867 16.2417 5.07096 14.8712C4.50325 13.5006 4.35471 11.9924 4.64412 10.5374C4.93354 9.08242 5.64792 7.74592 6.69692 6.69692C7.74592 5.64792 9.08242 4.93354 10.5374 4.64412C11.9924 4.35471 13.5006 4.50325 14.8712 5.07096C16.2417 5.63867 17.4132 6.60006 18.2374 7.83356C19.0616 9.06705 19.5015 10.5172 19.5015 12.0008C19.5015 13.9901 18.7112 15.8979 17.3046 17.3046C15.8979 18.7112 13.9901 19.5015 12.0008 19.5015Z",arrow_icon:"pi pi-angle-right"}:null,{label:"Attendance",to:"attendance-timesheet",icon:"M12.0873 9.75C12.2862 9.75 12.4769 9.82902 12.6176 9.96967C12.7582 10.1103 12.8373 10.3011 12.8373 10.5V11.664C12.8371 13.4558 12.5577 15.2367 12.0093 16.9425L10.0128 23.1525C9.9483 23.3371 9.81427 23.4893 9.63926 23.5765C9.46425 23.6637 9.26209 23.6791 9.07586 23.6195C8.88964 23.5598 8.73408 23.4298 8.64234 23.2571C8.5506 23.0844 8.52994 22.8827 8.58476 22.695L10.5798 16.4835C11.0805 14.926 11.3356 13.3 11.3358 11.664V10.5C11.3358 10.3011 11.4148 10.1103 11.5554 9.96967C11.6961 9.82902 11.8868 9.75 12.0858 9.75H12.0873Z",icon1:"M9.09108 10.5C9.09108 10.106 9.16868 9.71593 9.31944 9.35195C9.47021 8.98797 9.69119 8.65726 9.96976 8.37868C10.2483 8.1001 10.5791 7.87913 10.943 7.72836C11.307 7.5776 11.6971 7.5 12.0911 7.5C12.485 7.5 12.8752 7.5776 13.2391 7.72836C13.6031 7.87913 13.9338 8.1001 14.2124 8.37868C14.491 8.65726 14.712 8.98797 14.8627 9.35195C15.0135 9.71593 15.0911 10.106 15.0911 10.5C15.0911 10.6989 15.0121 10.8897 14.8714 11.0303C14.7308 11.171 14.54 11.25 14.3411 11.25C14.1422 11.25 13.9514 11.171 13.8108 11.0303C13.6701 10.8897 13.5911 10.6989 13.5911 10.5C13.5911 10.1022 13.433 9.72064 13.1517 9.43934C12.8704 9.15804 12.4889 9 12.0911 9C11.6933 9 11.3117 9.15804 11.0304 9.43934C10.7491 9.72064 10.5911 10.1022 10.5911 10.5V10.998C10.5911 11.6115 10.5581 12.222 10.4921 12.8295C10.4661 13.0232 10.3656 13.1991 10.2119 13.3198C10.0582 13.4404 9.8635 13.4964 9.6692 13.4757C9.47489 13.4549 9.29635 13.3592 9.17156 13.2088C9.04678 13.0584 8.98561 12.8653 9.00108 12.6705C9.06108 12.1155 9.09108 11.5575 9.09108 10.998V10.5ZM14.3546 12C14.4531 12.0025 14.5501 12.0244 14.6402 12.0645C14.7302 12.1045 14.8114 12.1619 14.8793 12.2334C14.9471 12.3048 15.0002 12.389 15.0355 12.481C15.0708 12.573 15.0877 12.671 15.0851 12.7695C15.0406 14.4733 14.7439 16.1612 14.2046 17.778L12.3056 23.478C12.2425 23.6668 12.1071 23.8228 11.929 23.9116C11.7509 24.0005 11.5448 24.0151 11.3561 23.952C11.1673 23.8889 11.0113 23.7535 10.9224 23.5754C10.8335 23.3974 10.819 23.1913 10.8821 23.0025L12.7826 17.3025C13.2744 15.8265 13.5449 14.2858 13.5851 12.7305C13.5876 12.632 13.6095 12.535 13.6496 12.4449C13.6896 12.3549 13.747 12.2736 13.8185 12.2058C13.8899 12.138 13.9741 12.0849 14.066 12.0496C14.158 12.0142 14.2561 11.9974 14.3546 12ZM9.32058 15.1725C9.41478 15.2016 9.50232 15.249 9.5782 15.3119C9.65407 15.3749 9.71679 15.4522 9.76277 15.5394C9.80874 15.6266 9.83707 15.722 9.84613 15.8202C9.8552 15.9183 9.84481 16.0173 9.81558 16.1115L7.86108 22.4085C7.83338 22.5043 7.78686 22.5935 7.72425 22.6711C7.66165 22.7487 7.5842 22.813 7.49645 22.8603C7.40869 22.9076 7.31239 22.9369 7.21317 22.9466C7.11395 22.9562 7.0138 22.946 6.91858 22.9165C6.82337 22.8869 6.73499 22.8387 6.65861 22.7747C6.58224 22.7106 6.5194 22.632 6.47378 22.5433C6.42816 22.4547 6.40066 22.3578 6.3929 22.2585C6.38514 22.1591 6.39727 22.0591 6.42858 21.9645L8.38308 15.666C8.44215 15.4764 8.57403 15.3179 8.74979 15.2254C8.92554 15.1329 9.13082 15.1139 9.32058 15.1725Z",icon2:"M7.13743 8.74938C7.55169 7.5833 8.36443 6.60096 9.43229 5.97565C10.5002 5.35034 11.7545 5.12222 12.9742 5.33154C14.1938 5.54085 15.3004 6.17415 16.0987 7.11972C16.8969 8.06529 17.3357 9.2624 17.3374 10.4999C17.3374 10.6988 17.2584 10.8896 17.1178 11.0302C16.9771 11.1709 16.7863 11.2499 16.5874 11.2499C16.3885 11.2499 16.1977 11.1709 16.0571 11.0302C15.9164 10.8896 15.8374 10.6988 15.8374 10.4999C15.8373 9.61533 15.5245 8.7593 14.9543 8.08307C14.384 7.40685 13.5931 6.95396 12.7213 6.80443C11.8495 6.65491 10.9529 6.81839 10.1899 7.26597C9.42698 7.71355 8.8468 8.41642 8.55193 9.25038C8.48549 9.43795 8.34726 9.59145 8.16765 9.67711C7.98803 9.76276 7.78175 9.77356 7.59418 9.70713C7.4066 9.64069 7.2531 9.50246 7.16744 9.32285C7.08179 9.14323 7.07099 8.93695 7.13743 8.74938ZM7.58743 11.2544C7.78532 11.2737 7.96743 11.3709 8.09373 11.5244C8.22002 11.678 8.28016 11.8755 8.26093 12.0734C8.15967 13.1059 7.95873 14.1261 7.66093 15.1199L5.82793 21.2279C5.77084 21.4184 5.64039 21.5785 5.46528 21.6729C5.29017 21.7673 5.08473 21.7882 4.89418 21.7311C4.70362 21.674 4.54354 21.5436 4.44917 21.3685C4.35479 21.1934 4.33384 20.9879 4.39093 20.7974L6.22393 14.6894C6.49416 13.7881 6.67651 12.8628 6.76843 11.9264C6.78778 11.7285 6.88492 11.5464 7.0385 11.4201C7.19207 11.2938 7.38952 11.2351 7.58743 11.2544ZM16.5874 12.2249C16.7863 12.2249 16.9771 12.3039 17.1178 12.4445C17.2584 12.5852 17.3374 12.776 17.3374 12.9749C17.3374 14.8949 17.0179 16.8029 16.3894 18.6179L14.7544 23.3354C14.6832 23.515 14.5455 23.6602 14.3698 23.7407C14.1942 23.8212 13.9943 23.8309 13.8117 23.7676C13.6292 23.7044 13.4781 23.5732 13.3899 23.4012C13.3017 23.2293 13.2833 23.03 13.3384 22.8449L14.9719 18.1274C15.5449 16.4699 15.8389 14.7284 15.8389 12.9749C15.8389 12.776 15.9179 12.5852 16.0586 12.4445C16.1992 12.3039 16.39 12.2249 16.5889 12.2249H16.5874Z",icon3:"M5.85107 6.33357C6.6844 5.08425 7.87386 4.11411 9.26521 3.54896C10.6566 2.98381 12.1856 2.84972 13.6541 3.16407C13.7505 3.18455 13.8419 3.22383 13.9232 3.27966C14.0044 3.33548 14.0739 3.40676 14.1276 3.48943C14.1813 3.5721 14.2182 3.66453 14.2361 3.76146C14.2541 3.85838 14.2528 3.95789 14.2323 4.05432C14.2118 4.15074 14.1726 4.24218 14.1167 4.32343C14.0609 4.40467 13.9896 4.47412 13.907 4.52782C13.8243 4.58151 13.7319 4.6184 13.6349 4.63637C13.538 4.65435 13.4385 4.65305 13.3421 4.63257C12.167 4.38041 10.9433 4.48729 9.82981 4.93933C8.71628 5.39138 7.76435 6.16771 7.09757 7.16757C6.98539 7.32908 6.81426 7.44007 6.62104 7.47664C6.42782 7.5132 6.22796 7.47241 6.06452 7.36306C5.90108 7.25371 5.78712 7.08453 5.7472 6.89198C5.70728 6.69942 5.74458 6.49889 5.85107 6.33357ZM15.9311 4.90107C16.061 4.75054 16.2454 4.65776 16.4437 4.64313C16.642 4.62851 16.838 4.69323 16.9886 4.82307C17.8048 5.52662 18.4594 6.39812 18.9078 7.37799C19.3562 8.35785 19.5877 9.42298 19.5866 10.5006V12.7506C19.5866 12.9495 19.5076 13.1402 19.3669 13.2809C19.2263 13.4215 19.0355 13.5006 18.8366 13.5006C18.6377 13.5006 18.4469 13.4215 18.3062 13.2809C18.1656 13.1402 18.0866 12.9495 18.0866 12.7506V10.5006C18.0876 9.63842 17.9024 8.78623 17.5436 8.0023C17.1848 7.21838 16.6608 6.52123 16.0076 5.95857C15.8573 5.82844 15.7648 5.64395 15.7504 5.44565C15.7361 5.24735 15.8011 5.05147 15.9311 4.90107ZM5.51807 8.76357C5.61561 8.77788 5.70937 8.81128 5.79398 8.86186C5.8786 8.91244 5.95241 8.9792 6.01121 9.05833C6.07 9.13747 6.11261 9.22741 6.13661 9.32303C6.16061 9.41864 6.16553 9.51805 6.15107 9.61556C6.10757 9.90356 6.08507 10.2006 6.08507 10.5006C6.08507 11.5656 5.93507 12.6261 5.63807 13.6506L3.92807 19.5351C3.90245 19.6317 3.85776 19.7223 3.79663 19.8014C3.7355 19.8805 3.65917 19.9466 3.57213 19.9958C3.48508 20.045 3.38908 20.0763 3.28976 20.0878C3.19045 20.0994 3.08983 20.0909 2.99382 20.063C2.89781 20.0351 2.80834 19.9883 2.73069 19.9253C2.65303 19.8624 2.58876 19.7845 2.54164 19.6963C2.49452 19.6081 2.4655 19.5114 2.45631 19.4118C2.44711 19.3123 2.45791 19.2119 2.48807 19.1166L4.19807 13.2321C4.45527 12.3444 4.58556 11.4248 4.58507 10.5006C4.58507 10.1256 4.61357 9.75656 4.66607 9.39656C4.68039 9.29903 4.71379 9.20527 4.76437 9.12065C4.81495 9.03604 4.88171 8.96222 4.96084 8.90343C5.03998 8.84464 5.12992 8.80203 5.22554 8.77803C5.32115 8.75403 5.42056 8.74911 5.51807 8.76357ZM18.8411 14.2536C19.0392 14.2704 19.2225 14.3651 19.3507 14.517C19.479 14.6689 19.5417 14.8655 19.5251 15.0636C19.3991 16.5636 19.0781 18.0426 18.5651 19.4646L17.4491 22.5666C17.3795 22.7506 17.2404 22.8999 17.0617 22.9824C16.8831 23.0648 16.6792 23.0737 16.494 23.0072C16.3088 22.9407 16.1572 22.8041 16.0718 22.6268C15.9864 22.4495 15.9741 22.2458 16.0376 22.0596L17.1551 18.9546C17.6212 17.6595 17.9157 16.3091 18.0311 14.9376C18.0479 14.7395 18.1426 14.5562 18.2945 14.4279C18.4464 14.2997 18.643 14.2369 18.8411 14.2536Z",icon4:"M7.21393 2.0543C8.69621 1.1985 10.3777 0.747992 12.0892 0.748047C13.8008 0.748102 15.4823 1.19872 16.9645 2.05461C18.4467 2.9105 19.6775 4.1415 20.5331 5.62386C21.3888 7.10622 21.8392 8.78771 21.8389 10.4993C21.8389 10.6982 21.7599 10.889 21.6193 11.0296C21.4786 11.1703 21.2878 11.2493 21.0889 11.2493C20.89 11.2493 20.6993 11.1703 20.5586 11.0296C20.418 10.889 20.3389 10.6982 20.3389 10.4993C20.3394 9.05089 19.9586 7.62787 19.2347 6.37332C18.5108 5.11877 17.4694 4.07692 16.2151 3.3525C14.9609 2.62808 13.538 2.24663 12.0896 2.24651C10.6412 2.24639 9.2183 2.62759 7.96393 3.3518C7.79253 3.44146 7.59311 3.46143 7.40733 3.40754C7.22154 3.35364 7.06377 3.23005 6.96696 3.06257C6.87016 2.89509 6.8418 2.69669 6.88783 2.5088C6.93385 2.32092 7.05069 2.15808 7.21393 2.0543ZM5.87893 3.9398C5.95241 4.00539 6.01225 4.08482 6.05503 4.17354C6.09781 4.26226 6.1227 4.35853 6.12827 4.45687C6.13384 4.55521 6.11999 4.65368 6.0875 4.74667C6.05502 4.83965 6.00453 4.92533 5.93893 4.9988C4.58353 6.50996 3.83547 8.46935 3.83893 10.4993C3.83893 10.6982 3.75992 10.889 3.61926 11.0296C3.47861 11.1703 3.28785 11.2493 3.08893 11.2493C2.89002 11.2493 2.69926 11.1703 2.5586 11.0296C2.41795 10.889 2.33893 10.6982 2.33893 10.4993C2.33893 8.0033 3.27793 5.7233 4.82143 3.9998C4.88703 3.92632 4.96645 3.86648 5.05517 3.8237C5.14389 3.78092 5.24017 3.75603 5.33851 3.75046C5.43685 3.74489 5.53532 3.75874 5.6283 3.79123C5.72129 3.82372 5.80546 3.8742 5.87893 3.9398ZM2.87143 12.0293C3.0627 12.0832 3.22477 12.2107 3.32208 12.3839C3.41938 12.5572 3.44397 12.7619 3.39043 12.9533L2.22193 17.1038C2.19861 17.2021 2.15565 17.2947 2.09564 17.376C2.03563 17.4574 1.9598 17.5257 1.87271 17.577C1.78562 17.6283 1.68907 17.6614 1.58886 17.6744C1.48864 17.6875 1.38682 17.6801 1.28952 17.6528C1.19222 17.6255 1.10144 17.5788 1.02264 17.5155C0.943832 17.4522 0.878628 17.3737 0.83094 17.2846C0.783251 17.1955 0.754062 17.0977 0.745126 16.997C0.736189 16.8963 0.747689 16.7949 0.778935 16.6988L1.94593 12.5483C1.97259 12.4534 2.01768 12.3647 2.07863 12.2873C2.13958 12.2099 2.21518 12.1452 2.30113 12.097C2.38709 12.0488 2.48169 12.018 2.57955 12.0064C2.6774 11.9948 2.77659 12.0026 2.87143 12.0293ZM21.0964 12.7508C21.1949 12.7527 21.2921 12.7741 21.3823 12.8136C21.4726 12.8531 21.5542 12.91 21.6224 12.981C21.6907 13.0521 21.7443 13.1359 21.7801 13.2276C21.816 13.3194 21.8334 13.4173 21.8314 13.5158C21.7864 15.7643 21.5899 18.0533 20.7409 20.3153L20.6359 20.5958C20.5625 20.7769 20.4212 20.9222 20.2422 21.0008C20.0632 21.0793 19.8606 21.0848 19.6776 21.0162C19.4946 20.9475 19.3456 20.8102 19.2623 20.6333C19.1791 20.4564 19.1682 20.2541 19.2319 20.0693L19.3369 19.7888C20.0959 17.7638 20.2879 15.6788 20.3314 13.4858C20.3334 13.3873 20.3547 13.2902 20.3942 13.1999C20.4337 13.1097 20.4906 13.0281 20.5617 12.9598C20.6327 12.8916 20.7165 12.838 20.8083 12.8021C20.9 12.7662 20.9979 12.7488 21.0964 12.7508Z"},{label:"Leave",to:"attendance-leave",icon:"",icon1:"M4.07326 0.0752583C3.98535 0.117457 3.86325 0.22061 3.80464 0.300319C3.70696 0.431605 3.69719 0.511314 3.68254 1.17712L3.66789 1.90857L2.80342 1.9367C1.89988 1.96483 1.68498 2.00234 1.1917 2.24616C0.932845 2.37276 0.503053 2.78537 0.34188 3.05732C0.0537241 3.55433 0.043956 3.62466 0.019536 5.0266L0 6.33008H12H24L23.9756 5.05004C23.956 3.92474 23.9414 3.74188 23.8535 3.51213C23.6581 2.98698 23.2918 2.55093 22.8181 2.27429C22.3834 2.0211 22.1099 1.96483 21.177 1.9367L20.337 1.90857L20.3223 1.19119C20.3028 0.41285 20.2784 0.342518 19.9658 0.122146C19.7753 -0.018517 19.3797 -0.0138283 19.1746 0.126835C18.906 0.309697 18.862 0.473804 18.862 1.23807V1.92263H18.1538H17.4457V1.25683C17.4457 0.473804 17.3773 0.276875 17.0598 0.103391C16.8205 -0.0278945 16.6056 -0.0278945 16.3663 0.103391C16.0488 0.276875 15.9805 0.473804 15.9805 1.25683V1.92263L11.9902 1.93201L7.99512 1.94608L7.9707 2.70566C7.95116 3.37615 7.93651 3.47931 7.84371 3.59652C7.6337 3.87316 7.25275 3.96225 6.94506 3.80283C6.61294 3.63404 6.58364 3.54964 6.55433 2.70566L6.52991 1.94608L5.83639 1.93201L5.14774 1.91794L5.12821 1.19587C5.11355 0.558202 5.10379 0.459737 5.01099 0.347207C4.77167 0.0330591 4.38584 -0.0747824 4.07326 0.0752583ZM5.13797 2.565C5.13797 3.32927 5.09402 3.50744 4.86935 3.69968C4.52259 3.99038 4.00488 3.91067 3.7851 3.54026C3.68254 3.36678 3.67277 3.29175 3.67277 2.63533V1.92263H4.40537H5.13797V2.565ZM17.4359 2.66815C17.4212 3.47931 17.3968 3.54495 17.0989 3.76063C16.7717 3.99507 16.2637 3.86378 16.083 3.49806C15.9951 3.32458 15.9805 3.21205 15.9805 2.61188V1.92263H16.7179H17.4506L17.4359 2.66815ZM20.3223 2.66815C20.3028 3.33395 20.293 3.43242 20.2002 3.54495C19.9414 3.87785 19.5653 3.97632 19.2332 3.78876C18.906 3.6059 18.862 3.46055 18.862 2.64002V1.92263H19.5995H20.337L20.3223 2.66815Z",icon2:"M6.94736 0.0838771C6.61037 0.243295 6.57618 0.341759 6.56153 1.17636L6.54688 1.92188H7.25506H7.96812V1.1998C7.96812 0.533999 7.95835 0.473045 7.85579 0.323004C7.7288 0.140142 7.46995 -0.000520706 7.25994 -0.000520706C7.1818 -0.000520706 7.04016 0.0369895 6.94736 0.0838771Z",icon3:"M0.00781811 14.8259C0.00781811 22.5296 0.0029341 22.267 0.281322 22.7921C0.462031 23.1438 0.955315 23.5986 1.3265 23.7674C1.49256 23.8424 1.77583 23.9268 1.95165 23.9596C2.18608 23.9925 5.12626 24.0065 12.1934 23.9971C21.7661 23.9831 22.1177 23.9784 22.3473 23.894C22.7429 23.7486 23.0115 23.5798 23.285 23.3173C23.5536 23.0594 23.6806 22.8625 23.8613 22.4123L23.9639 22.1545L23.9785 14.9431L23.9932 7.73649H11.998H0.00781811V14.8259ZM12.926 9.73391C15.1727 10.1043 16.97 11.6844 17.5414 13.785C18.4889 17.2641 15.7343 20.6775 11.9785 20.6775C9.89793 20.6775 8.02247 19.6178 6.97241 17.8408C6.50843 17.0671 6.25934 16.1341 6.25934 15.201C6.25934 13.6631 6.821 12.3502 7.94433 11.2765C8.85275 10.4044 9.92235 9.89802 11.2899 9.69171C11.6073 9.64013 12.5304 9.66827 12.926 9.73391Z",icon4:"M11.0715 11.1405C10.3535 11.2906 9.62095 11.6657 9.06417 12.1627C8.0776 13.0395 7.5599 14.3805 7.72595 15.637C8.01899 17.8783 10.0898 19.4912 12.3951 19.2662C12.9811 19.2099 13.3474 19.1114 13.8651 18.8723C14.9347 18.3753 15.7553 17.4516 16.1069 16.3404C16.229 15.9606 16.2437 15.848 16.2437 15.1916C16.2485 14.568 16.2339 14.4133 16.1362 14.0898C15.7308 12.7347 14.6808 11.6844 13.2937 11.2437C12.8786 11.1124 12.7565 11.0983 12.1216 11.0842C11.6136 11.0702 11.3157 11.0889 11.0715 11.1405ZM14.4268 13.3677C14.6954 13.5552 14.798 13.9632 14.6417 14.2445C14.6026 14.3148 13.9384 14.9759 13.1619 15.7168C11.9604 16.8655 11.7308 17.0624 11.5746 17.0906C11.2278 17.1515 11.0764 17.0577 10.2266 16.2513C9.44024 15.5058 9.24 15.2619 9.24 15.0322C9.24 14.7368 9.48908 14.4227 9.77724 14.3476C10.1191 14.2585 10.2852 14.3429 10.8713 14.9056L11.4134 15.4261L12.4634 14.418C13.0544 13.8506 13.6014 13.3677 13.7089 13.3114C13.9384 13.1989 14.207 13.2223 14.4268 13.3677Z"},C.data==2||C.data==4?{label:"Organization",subItems:[{label:"Manage Employees",to:"manageEmployees"},{label:"ORG structure",to:"employee-hierarchy"},{label:"Onboarding",to:"employee-onboarding-v2"},{label:"Onboarding Bulk Upload",to:"bulkEmployeeOnboarding"},{label:"Onboarding Quick Upload",to:"quickEmployeeOnboarding"},{label:"Manage WelcomeMail Status",to:"manage_welcome_mails_status"},{label:"Roles & Permissions",to:"roles_permissions"}],arrow_icon:"pi pi-angle-right",icon:"M8.66797 2.57179C8.66797 2.23358 8.71986 1.8987 8.82067 1.58631C8.92148 1.27393 9.06924 0.990165 9.25548 0.75128C9.44172 0.512395 9.66278 0.323075 9.90601 0.194161C10.1492 0.0652469 10.4099 -0.000730326 10.673 6.09743e-06H13.3401C13.8707 6.09743e-06 14.3796 0.270959 14.7548 0.753261C15.13 1.23556 15.3407 1.88971 15.3407 2.57179V6.00035C15.3407 6.33808 15.289 6.67251 15.1885 6.98453C15.0879 7.29656 14.9405 7.58006 14.7548 7.81887C14.569 8.05768 14.3484 8.24712 14.1057 8.37637C13.863 8.50561 13.6028 8.57213 13.3401 8.57213H13.0069V10.7155H19.3409C19.96 10.7166 20.5534 11.0337 20.9907 11.5971C21.4279 12.1605 21.6732 12.9241 21.6726 13.7199V15.4279H21.9994C22.2621 15.4279 22.5222 15.4944 22.765 15.6236C23.0077 15.7529 23.2282 15.9423 23.414 16.1811C23.5998 16.4199 23.7472 16.7035 23.8477 17.0155C23.9483 17.3275 24 17.6619 24 17.9996V21.4282C23.9997 22.1101 23.7888 22.7638 23.4136 23.2458C23.0385 23.7278 22.5298 23.9986 21.9994 23.9986H19.3355C18.8049 23.9986 18.296 23.7276 17.9208 23.2453C17.5456 22.763 17.3348 22.1089 17.3348 21.4268V17.9982C17.3348 17.3162 17.5456 16.662 17.9208 16.1797C18.296 15.6974 18.8049 15.4265 19.3355 15.4265H19.6687V13.7199C19.6684 13.6064 19.6332 13.4976 19.5708 13.4174C19.5084 13.3371 19.4238 13.2919 19.3355 13.2915H13.0014V15.4279H13.3347C13.5974 15.4279 13.8575 15.4944 14.1003 15.6236C14.343 15.7529 14.5635 15.9423 14.7493 16.1811C14.9351 16.4199 15.0825 16.7035 15.183 17.0155C15.2836 17.3275 15.3353 17.6619 15.3353 17.9996V21.4282C15.3353 22.1103 15.1245 22.7644 14.7493 23.2467C14.3741 23.729 13.8653 24 13.3347 24H10.673C10.1424 24 9.63349 23.729 9.2583 23.2467C8.8831 22.7644 8.67232 22.1103 8.67232 21.4282V17.9982C8.67261 17.3164 8.88352 16.6626 9.25868 16.1806C9.63384 15.6986 10.1425 15.4279 10.673 15.4279H10.9997V13.2845H4.6667C4.5784 13.2849 4.4938 13.3301 4.43137 13.4104C4.36893 13.4906 4.33373 13.5994 4.33344 13.7129V15.4279H4.6667C4.92942 15.4279 5.18958 15.4944 5.43231 15.6236C5.67503 15.7529 5.89558 15.9423 6.08136 16.1811C6.26714 16.4199 6.4145 16.7035 6.51504 17.0155C6.61558 17.3275 6.66733 17.6619 6.66733 17.9996V21.4282C6.66733 22.1103 6.45655 22.7644 6.08136 23.2467C5.70617 23.729 5.1973 24 4.6667 24H2.00064C1.73782 24 1.47757 23.9334 1.23477 23.8041C0.991975 23.6748 0.771378 23.4852 0.585588 23.2463C0.399797 23.0073 0.252454 22.7236 0.151977 22.4114C0.0514996 22.0992 -0.000142773 21.7647 2.96455e-07 21.4268V17.9982C0.000289035 17.3164 0.211197 16.6626 0.586358 16.1806C0.961518 15.6986 1.47022 15.4279 2.00064 15.4279H2.33389V13.7199C2.33389 12.9242 2.57978 12.1611 3.01747 11.5984C3.45516 11.0358 4.0488 10.7197 4.66779 10.7197H10.9997V8.57073H10.673C10.4102 8.57073 10.1501 8.50421 9.90735 8.37497C9.66462 8.24572 9.44407 8.05629 9.2583 7.81747C9.07252 7.57866 8.92515 7.29516 8.82461 6.98313C8.72407 6.67111 8.67232 6.33668 8.67232 5.99895L8.66797 2.57179Z"}:null,C.data==2||C.data==4?{label:"Approvals",subItems:[{label:"Onboarding",to:"approvals-documents"},{label:"Leaves",to:"attendance-leave-approvals"},{label:"Attendance Regularization",to:"attendance-regularization-approvals"},{label:"Reimbursement",to:"approval_reimbursements"},{label:"Taxations ",to:""},{label:"Employee Details",to:"Employee-Details-approvals"},{label:"Loan And Salary Advance ",to:"showSAapprovalView"}],arrow_icon:"pi pi-angle-right",icon:"",icon1:"M8.60439 7.98128C11.0399 7.98128 13.0213 6.19106 13.0213 3.99064C13.0214 1.79015 11.0399 0 8.60439 0C6.16886 0 4.1875 1.79015 4.1875 3.99064C4.1875 6.19114 6.16895 7.98128 8.60439 7.98128Z",icon2:"M19.0027 14.9746C16.2485 14.9746 14.0078 16.9991 14.0078 19.4874C14.0078 21.9758 16.2485 24.0003 19.0027 24.0003C21.7568 24.0003 23.9975 21.9758 23.9975 19.4874C23.9975 16.9991 21.7569 14.9746 19.0027 14.9746ZM22.0451 18.5501L18.7811 21.4992C18.6169 21.6474 18.4018 21.7216 18.1866 21.7216C17.9714 21.7216 17.7563 21.6474 17.5921 21.4992L15.9601 20.0246C15.6318 19.728 15.6318 19.247 15.9601 18.9504C16.2885 18.6538 16.8207 18.6538 17.1491 18.9504L18.1866 19.8878L20.8561 17.4759C21.1845 17.1793 21.7167 17.1793 22.0451 17.4759C22.3735 17.7725 22.3735 18.2535 22.0451 18.5501Z",icon3:"M17.2101 13.9563V13.2523C17.2101 11.7336 16.1299 10.387 14.5327 9.91431L14.5253 9.91213L12.189 9.56263C11.9902 9.50736 11.7777 9.60247 11.7062 9.77968L9.05541 16.3509C8.90247 16.73 8.30904 16.73 8.1561 16.3509L5.50528 9.77968C5.4475 9.63657 5.29805 9.54688 5.13786 9.54688C5.09985 9.54688 2.68632 9.91164 2.68632 9.91164C1.07596 10.3965 0 11.7453 0 13.2704V18.7383C0 19.5577 0.735194 20.2219 1.64211 20.2219H12.6794C12.6453 19.9808 12.6257 19.7357 12.6257 19.4863C12.6258 16.8713 14.5639 14.6588 17.2101 13.9563Z",icon4:"M9.58139 9.1629C9.47791 9.06108 9.32667 9.00977 9.17373 9.00977H8.03257C7.87953 9.00977 7.72829 9.061 7.6249 9.1629C7.46471 9.32055 7.44146 9.54827 7.55523 9.72629L8.1652 10.5572L7.87962 12.7337L8.44193 14.0852C8.49676 14.2211 8.70953 14.2211 8.76436 14.0852L9.32667 12.7337L9.04109 10.5572L9.65107 9.72629C9.76483 9.54827 9.74158 9.32055 9.58139 9.1629Z"}:null,{label:"Performance",subItems:C.data==2||C.data==4?[{label:"Self Appraisal",to:"employee-appraisal"},{label:"Team Appraisal",to:"team-appraisal"},{label:"Org Appraisal",to:"pms"},{label:"PMS Config",to:"config-pms"},{label:"PMS Forms Management",to:"pms-forms-mgmt"}]:[{label:"Self Appraisal",to:"employee-appraisal"}],arrow_icon:"pi pi-angle-right",icon:"M23 1L13.5 10.5L8.5 5.5L1 13",icon1:"1.71429",icon2:"",icon3:"",icon4:"",stroke_width:"1.71429"},C.data==2||C.data==4?{label:"Payroll",subItems:[{label:"Analytics",to:"payroll-analytics"},{label:"Pay Run",to:"payRun"},{label:"Manage Payslip",to:"showManagePayslipsPage"},{label:"Claim",to:"payroll-claims"},{label:"Reports",to:"reports-payroll"}],arrow_icon:"pi pi-angle-right",icon:"M23.8005 14.6955C23.6703 14.471 23.5062 14.2812 23.3178 14.1371C23.1294 13.993 22.9203 13.8973 22.7026 13.8557C22.4848 13.8141 22.2628 13.8274 22.0491 13.8947C21.8354 13.962 21.6344 14.082 21.4575 14.2479L16.443 18.9178H11.3925C11.3066 18.9161 11.2218 18.8927 11.1431 18.8489C11.0644 18.8051 10.9935 18.7418 10.9345 18.6628C10.8755 18.5837 10.8296 18.4906 10.7996 18.3887C10.7695 18.2869 10.7559 18.1785 10.7595 18.0699C10.7589 17.8529 10.8242 17.6439 10.942 17.4861C11.0599 17.3283 11.2211 17.2337 11.3925 17.2221H14.67C14.9952 17.2241 15.3112 17.0855 15.5655 16.8291C15.8198 16.5728 15.9971 16.2141 16.068 15.8128C16.0992 15.5695 16.0883 15.3206 16.0362 15.0831C15.9841 14.8457 15.892 14.6253 15.7661 14.4372C15.6403 14.249 15.4837 14.0976 15.3072 13.9932C15.1307 13.8888 14.9384 13.834 14.7435 13.8325H8.00401C6.87465 13.84 5.78044 14.33 4.89901 15.2229L2.94902 17.2221L0.633019 17.1746C0.458399 17.1977 0.296834 17.3022 0.179812 17.4677C0.0627895 17.6332 -0.0013048 17.8479 2.01387e-05 18.0699V23.1533C-0.000981084 23.3705 0.064245 23.5798 0.182137 23.7377C0.300029 23.8956 0.461515 23.9899 0.633019 24.0012H15.1305C16.0602 23.9985 16.9652 23.6225 17.715 22.9276C24.189 16.9622 24.348 15.6382 23.8005 14.6955Z",icon1:"M14.6145 1.20446V0H9.375V1.20446H11.043C11.3375 1.20562 11.6245 1.32202 11.8646 1.53767C12.1047 1.75333 12.2861 2.05767 12.384 2.40891H9.375V3.61337H12.384C12.2861 3.96462 12.1047 4.26896 11.8646 4.48462C11.6245 4.70027 11.3375 4.81667 11.043 4.81783H9.375V6.27266L12.036 9.63756H13.386L10.5255 6.02418H11.043C11.5918 6.02354 12.1237 5.78357 12.5489 5.34474C12.9741 4.90591 13.2665 4.29508 13.377 3.61527H14.616V2.40891H13.377C13.3041 1.97069 13.1539 1.55895 12.9375 1.20446H14.6145Z",icon2:"",icon3:"",icon4:""}:null,{label:"Paycheck",subItems:[{label:"Salary Details",to:"salary_details"},{label:"Investments",to:"investments_details"},{label:"Form 16",to:"form16_details"},{label:"Loan And Salary Advance",to:"showSAemployeeView"}],arrow_icon:"pi pi-angle-right",icon:"M21 24H3C2.33061 23.9997 1.68054 23.7756 1.15323 23.3633C0.625918 22.9509 0.251657 22.3741 0.09 21.7245L12 15.108L23.9115 21.726C23.7495 22.3755 23.3749 22.9522 22.8473 23.3643C22.3197 23.7764 21.6694 24.0002 21 24ZM24 20.0595L15.4605 15.315L24 10.3095V20.0595ZM1.50058e-08 20.0595V10.3095L8.5395 15.315L1.50058e-08 20.0565V20.0595ZM9.75 14.25L4.5 11.25V2.25C4.5 1.65326 4.73705 1.08097 5.15901 0.65901C5.58097 0.237053 6.15326 0 6.75 0L17.25 0C17.8467 0 18.419 0.237053 18.841 0.65901C19.2629 1.08097 19.5 1.65326 19.5 2.25V11.25L14.25 14.25L12 13.125L9.75 14.25ZM10.0245 7.3725V8.241L12.0315 10.248H13.05L10.8915 8.0925H11.2815C11.6953 8.09169 12.0961 7.94836 12.4166 7.68663C12.737 7.4249 12.9576 7.06076 13.041 6.6555H13.9755V5.937H13.041C12.9859 5.67562 12.8726 5.43002 12.7095 5.2185H13.9755V4.5H10.023V5.22H11.2815C11.5034 5.22138 11.7195 5.29109 11.9004 5.41965C12.0813 5.54821 12.2182 5.72937 12.2925 5.9385H10.023V6.657H12.3C12.2261 6.86637 12.0893 7.04778 11.9083 7.17639C11.7273 7.30501 11.511 7.37455 11.289 7.3755L10.0245 7.3725ZM21 10.329V4.6995L22.4115 5.4495C22.8918 5.70561 23.2934 6.08759 23.5732 6.5545C23.8531 7.02141 24.0006 7.55566 24 8.1V8.5695L21 10.329ZM3 10.329L1.50058e-08 8.5695V8.1C-5.437e-05 7.55617 0.147721 7.02255 0.427521 6.55621C0.707321 6.08988 1.10862 5.70837 1.5885 5.4525L3 4.6995V10.329Z",icon1:"",icon2:"",icon3:"",icon4:""},{label:"Claim",subItems:[{label:"Reimbursements",to:"employee_reimbursements"}],arrow_icon:"pi pi-angle-right",icon:"M14.5859 0H4.00043C2.93945 0 1.92193 0.316096 1.1717 0.878751C0.421473 1.44141 0 2.20453 0 3.00024V20.9998C0 21.7955 0.421473 22.5586 1.1717 23.1212C1.92193 23.6839 2.93945 24 4.00043 24H19.9996C20.5249 24 21.0451 23.9224 21.5305 23.7716C22.0158 23.6208 22.4568 23.3998 22.8283 23.1212C23.1998 22.8426 23.4944 22.5119 23.6955 22.1479C23.8965 21.7839 24 21.3938 24 20.9998V7.06037C24 6.66289 23.7896 6.28167 23.415 6.00049L16.0043 0.442675C15.8185 0.302396 15.5975 0.191066 15.3541 0.115094C15.1106 0.0391214 14.8496 6.30485e-06 14.5859 0ZM14.9994 5.2497V2.24945L20.9994 6.74933H17.0002C16.7375 6.74946 16.4774 6.71076 16.2346 6.63546C15.9919 6.56015 15.7713 6.44971 15.5855 6.31044C15.3997 6.17118 15.2523 6.00581 15.1517 5.82381C15.0511 5.6418 14.9994 5.44671 14.9994 5.2497ZM4.99892 15.0002H14.9994C15.2645 15.0002 15.5188 15.0792 15.7063 15.2199C15.8938 15.3605 15.9991 15.5512 15.9991 15.7501C15.9991 15.9489 15.8938 16.1396 15.7063 16.2803C15.5188 16.4209 15.2645 16.4999 14.9994 16.4999H5.00022C4.73506 16.4999 4.48076 16.4209 4.29326 16.2803C4.10577 16.1396 4.00043 15.9489 4.00043 15.7501C4.00043 15.5512 4.10577 15.3605 4.29326 15.2199C4.48076 15.0792 4.73506 15.0002 5.00022 15.0002H4.99892ZM4.99892 18.0005H14.9994C15.2645 18.0005 15.5188 18.0795 15.7063 18.2201C15.8938 18.3607 15.9991 18.5514 15.9991 18.7503C15.9991 18.9492 15.8938 19.1399 15.7063 19.2805C15.5188 19.4211 15.2645 19.5001 14.9994 19.5001H5.00022C4.73506 19.5001 4.48076 19.4211 4.29326 19.2805C4.10577 19.1399 4.00043 18.9492 4.00043 18.7503C4.00043 18.5514 4.10577 18.3607 4.29326 18.2201C4.48076 18.0795 4.73506 18.0005 5.00022 18.0005H4.99892Z",icon1:"",icon2:"",icon3:"",icon4:""},C.data==2||C.data==4?{label:"Report",to:"reports",icon:"M23.5902 0.1275C23.7161 0.195956 23.8194 0.288554 23.8909 0.397119C23.9623 0.505684 23.9998 0.626877 24 0.75V12C24 12.1498 23.9447 12.2961 23.8414 12.4202C23.7381 12.5442 23.5914 12.6403 23.4203 12.696L23.4148 12.6975L23.4037 12.702L23.3612 12.7155C23.1185 12.7939 22.8742 12.8689 22.6283 12.9405C22.1409 13.083 21.4634 13.275 20.6954 13.4655C19.1889 13.8435 17.2265 14.25 15.6923 14.25C14.1286 14.25 12.8345 13.83 11.7083 13.4625L11.6566 13.4475C10.4862 13.065 9.48923 12.75 8.30769 12.75C7.01538 12.75 5.28369 13.095 3.80862 13.4655C3.14816 13.6327 2.49374 13.8153 1.84615 14.013V23.25C1.84615 23.4489 1.7489 23.6397 1.57579 23.7803C1.40268 23.921 1.16789 24 0.923077 24C0.678262 24 0.443474 23.921 0.270363 23.7803C0.0972527 23.6397 0 23.4489 0 23.25V0.75C0 0.551088 0.0972527 0.360322 0.270363 0.21967C0.443474 0.0790176 0.678262 0 0.923077 0C1.16789 0 1.40268 0.0790176 1.57579 0.21967C1.7489 0.360322 1.84615 0.551088 1.84615 0.75V1.173C2.26338 1.0545 2.76185 0.918 3.30462 0.783C4.81108 0.408 6.77538 0 8.30769 0C9.85846 0 11.1212 0.4155 12.2234 0.7785L12.3028 0.8055C13.4511 1.182 14.4517 1.5 15.6923 1.5C16.9846 1.5 18.7163 1.155 20.1914 0.7845C21.032 0.571218 21.8627 0.33306 22.6818 0.0705L22.7169 0.06L22.7243 0.057H22.7262",icon1:"",icon2:"",icon3:"",icon4:""}:null]})}),(C,r)=>Z(_).current_user_role?(l(),t("nav",{key:0,class:d(["bg-gray-900 transition-all duration-700 overflow-x-scroll pt-2 h-screen",[n.value?"w-60 px-2":"w-[56px] "]]),ref:"content",onMouseenter:r[1]||(r[1]=e=>(n.value=!0,s.value=!0)),onMouseleave:r[2]||(r[2]=e=>(n.value=!1,s.value=!1,p.value=!1))},[a("div",O,[a("button",{class:"mx-4 my-3",onClick:w},[s.value?i("",!0):(l(),t("img",P)),s.value?(l(),t("img",E)):i("",!0)])]),(l(!0),t(b,null,m(v.value,(e,c)=>(l(),t(b,{key:c},[e?(l(),t("div",F,[n.value?(l(),t("a",{key:0,role:"button",onClick:L=>(g(c),e.subItems?" ":V(e.to)),class:d([{"bg-yellow-400 text-[001820] ":h(c)},"flex items-center rounded-l-md my-2 p-2 w-full relative left-3 transition ease-in-out delay-75 hover:-translate-y-1 hover:scale-110 hover: duration-300 hover:bg-yellow-400"])},[a("span",null,[(l(),t("svg",$,[a("path",{d:e.icon,fill:"white"},null,8,z),a("path",{d:e.icon1,fill:"white"},null,8,T),a("path",{d:e.icon2,fill:"white"},null,8,j),a("path",{d:e.icon3,fill:"white"},null,8,U),a("path",{d:e.icon4,fill:"white"},null,8,N)]))]),a("span",{class:d(["font-semibold text-white text-[12px]",[n.value?"":"hidden"]])},H(e.label),3),a("i",{class:d([e.arrow_icon,"text-white absolute right-4"])},null,2)],10,D)):(l(),t("a",{key:1,role:"button",onClick:L=>g(c),href:e.to,class:d([{" bg-yellow-400 text-[001820]  w-[40px] relative left-2  text-[#F6F6F6] flex justify-center  ":h(c)},"py-3 w-[60px] flex justify-center items-center text-[#001820] :hover: rounded-l transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover: duration-300 hover:bg-yellow-400"])},[(l(),t("svg",G,[a("path",{d:e.icon,fill:"white"},null,8,Q),a("path",{d:e.icon1,fill:"white"},null,8,W),a("path",{d:e.icon2,fill:"white"},null,8,Y),a("path",{d:e.icon3,fill:"white"},null,8,J),a("path",{d:e.icon4,viewBox:"0 0 24 14","stroke-width":"menu.stroke_width",fill:"white"},null,8,K)]))],10,q)),e.subItems?(l(),k(A,{key:2,"enter-active-class":"transition ease-out duration-200 transform delay-150 ","enter-class":"opacity-0 translate-y-2","enter-to-class":"opacity-100 translate-y-0","leave-active-class":"transition ease-in duration-200  delay-150  transform","leave-class":"opacity-100 translate-y-0","leave-to-class":"opacity-0 translate-y-2"},{default:x(()=>[p.value?(l(),t("div",X,[h(c)?(l(),t("div",C1,[(l(!0),t(b,null,m(e.subItems,(L,M)=>(l(),t("a",{key:M,onClick:r[0]||(r[0]=a1=>p.value=!1),href:L.to,class:"transition ease-in-out delay-50 hover:-translate-y-1 hover:scale-110 hover: duration-300 text-sm font-semibold whitespace-nowrap cursor-pointer text-white w-full block hover:bg-gray-600 focus:bg-gray-600 p-2.5 rounded-lg"},H(L.label),9,e1))),128))])):i("",!0)])):i("",!0)]),_:2},1024)):i("",!0)])):i("",!0)],64))),128))],34)):i("",!0)}};export{i1 as _};
