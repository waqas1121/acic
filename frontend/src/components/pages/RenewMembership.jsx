import React from 'react';
import Tabs, { TabPane } from 'rc-tabs';
import { NavLink } from 'react-router-dom';
import { Form, FormControl, FormGroup, Button, FormLabel } from "react-bootstrap";

// 
import ShopTabDataLoop from "../pages/ShopTabDataLoop";

// imprt images
import vector_logo_5 from "../../images/vector_logo_5.svg";
import pay from "../../images/pay.svg";
import propduct01 from "../../images/shop_product.png";


const callback = function (key) { };
const RenewMembership = () => {
    // ShopTabDataLoopArray
    const ShopTabDataLoopArray = [
        {
            key: "0",
            shop_product: propduct01,
        },
    ]
    return (
        <>
            <div className="py-5 gx-0 membership">
                <div className="col-xl-11 col-11 mx-auto">
                    <div className="iframesite">
                        <iframe width='100%' height='1700px' frameborder='no' scrolling="no" src='https://acic.wildapricot.org/widget/event-4068813'  onload='tryToEnableWACookies("https://acic.wildapricot.org");' ></iframe>
                    </div>
                    <script  type="text/javascript" language="javascript" src="https://acic.wildapricot.org/Common/EnableCookies.js" ></script>
                </div>
            </div>
        </>
    )
}

export default RenewMembership;
