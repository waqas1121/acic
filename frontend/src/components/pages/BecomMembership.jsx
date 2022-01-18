import React from 'react';
import { Form } from "react-bootstrap";
import { NavLink } from "react-router-dom";
// import moment from 'moment';
// import momenthijri from 'moment-hijri';
import RadioDataLoop from "../pages/RadioDataLoop";

const BecomMembership = () => {
    
    
    
    return (
        <>
            <div className="py-4 mb-5">
                <div className="col-xl-11 col-10 mx-auto">
                
                <iframe width='100%' height='500px' frameborder='no' scrolling="no" src='https://acic.wildapricot.org/widget/membership'  onload='tryToEnableWACookies("https://acic.wildapricot.org");' ></iframe>
                    
                    <script  type="text/javascript" language="javascript" src="https://acic.wildapricot.org/Common/EnableCookies.js" ></script>

                    </div>
                </div>
         
         
        </>
    )
}

export default BecomMembership;
