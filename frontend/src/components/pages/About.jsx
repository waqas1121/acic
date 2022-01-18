import React,{useState,useEffect} from 'react';
import globallink from "../Globalurl";
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';
import aboutbg from "../../images/about-bg.png";

const Committees = () => {
    
    return (
        <>
            <div id="about" className="about paragraph_grey1bgcolor mb-5">
                <div className="row gx-0 ">
                    <div className="col-xl-5 d-none d-xl-block"><img className="img-fluid h-100" src={aboutbg} alt="icon" /></div>
                    <div className="col-xl-7 py-5">
                        <div className="px-xl-5 px-4">
                            <h6 className="">About Us</h6>
                            {/* <div className="d-flex align-items-center mb-4">
                                <NavLink to="#" className="fontsize16 p-0 me-3 fontweightregular goldentextcolor">Our History</NavLink>
                                <NavLink to="/expansion" className="fontsize16 fontweightregular maintextcolor p-0 me-3">Expansion Project</NavLink>
                                <NavLink to="/board_directors" className="fontsize16 fontweightregular maintextcolor p-0 me-3">Board of Directors</NavLink>
                            </div> */}
                            
                            <h5 className="goldentextcolor mb-2 text-capitalize fontsize24">Background</h5>
                            <p className="fontsize18 maintextcolor">Afghan Canadian Islamic Community (ACIC) is a non-proﬁt charitable organization providing cultural, social and religious services. </p>
                            <p className="fontsize18 maintextcolor">ACIC began its activites as a small community association in 1989 in response to the growing need of Afghan immigrants for a place where they can practice their religion, traditions, and celebrate cultural ceremonies. Two years later, in 1991, the organization  </p>
                            <p className="fontsize18 maintextcolor">ACIC currently provides services to about 1200 families and individual members as well as hundreds of non-members who participate, enjoy our programs, and beneﬁt from our services.  </p>
                            <h6 className="goldentextcolor mb-2 text-capitalize fontsize24">Vision</h6>
                            <p className="fontsize18 maintextcolor">A dynamic and inclusive community that constantly thrives towards cultural, social and spiritual growth</p>
                            <h6 className="goldentextcolor mb-2 text-capitalize fontsize24">Mission Statement</h6>
                            <p className="fontsize18 maintextcolor">To help members of the community make a positive difference by educating, inspiring and empowering them through a variety of educational and cultural programs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Committees;
