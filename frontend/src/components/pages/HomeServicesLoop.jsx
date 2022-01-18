import React from 'react';
import { NavLink } from "react-router-dom";
const HomeServicesLoop = (props) => {
    return (
        <>
            <div className="col-xl-4 col-lg-6 mb-5 text-center">
                <div className="servivesbox">
                    <NavLink to={props.linksa}>
                    <p className="m-0"><img className="img-fluid" src={props.servicesicon1} alt="icon" /></p>
                    <h5>{props.title}</h5>
                    </NavLink>
                </div>
            </div>
        </>
    )
}

export default HomeServicesLoop;
