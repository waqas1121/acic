import React,{useState,useEffect} from 'react';
import { NavLink } from 'react-bootstrap';
import { Table } from "react-bootstrap";

// 
import PresidentLoop from "../pages/PresidentLoop";
import ViocePresidentLoop from "../pages/ViocePresidentLoop";
import TreasurerLoop from "../pages/TreasurerLoop";
import SecretaryLoop from "../pages/SecretaryLoop";
import CulturalLoop from "../pages/CulturalLoop";
import WomenServicesLoop from "../pages/WomenServicesLoop";
import EducationalLoop from "../pages/EducationalLoop";
import YouthLoop from "../pages/YouthLoop";
import SocialLoop from "../pages/SocialLoop";
import InternalLoop from "../pages/InternalLoop";
import FinanceLoop from "../pages/FinanceLoop";

import globallink from "../Globalurl";
import axios from 'axios';
// images import
import avatar_01 from "../../images/avatar_01.svg";
import avatar_02 from "../../images/avatar_02.svg";
import { Markup } from 'interweave';
import { Alert } from 'bootstrap';
const BoardDirectors = () => {
    // President
    const PresidentLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // ViocePresident
    const ViocePresidentLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Treasurer
    const TreasurerLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Secretary
    const SecretaryLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Cultural
    const CulturalLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // WomenServicesLoop
    const WomenServicesLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Educational
    const EducationalLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // YouthLoop
    const YouthLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Social
    const SocialLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // Internal
    const InternalLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]
    // 
    const FinanceLoopArray = [
        {
            key: "0",
            tdtext1: "1991 - 1993",
            tdtext2: "M. Ibrahim Qasimi",
        },
        {
            key: "1",
            tdtext1: "1994 - 1995",
            tdtext2: "Faqir Hussain Shari",
        },
    ]

    const[allmember,setmember]=useState({member_array:[]})
    useEffect(() => {

        axios
          .get(globallink.url+'all-board-members')
          .then(response => {
            setmember({member_array:response.data.members});
           
       

        });
          
      }, []);

    return (
        <>

            
            <div className="py-5 membership">
                <div className="col-xl-11 col-10 mx-auto">
                    <div className="row">
{allmember.member_array.map((val,index) => {
    if(val.id == 1){
        return(
            <>
            <div className="py-5">
                <div className="col-xl-11 col-10 mx-auto">
                    <h4 className="fontsize18 fontweightbold">Meet the board of directors</h4>
                    <p>ACIC’s affairs are primarily run and managed by a Board of Directors, along with the help of volunteers. Members of the Board of Directors are elected in annual general meeting by ACIC members and serve on a volunteer basis. Currently, the ACIC Board of Directors consists of the following eleven</p>
                    <h4 className="fontsize18 fontweightbold">Members:</h4>
                </div>
            </div>
            {/*  */}
            <div className="py-5 light_greybgcolor" style={{marginBottom: "30px"}}>
                <div className="col-xl-11 col-10 mx-auto">
                    <div className="d-inline-block mb-4 w-260px h-260px border_radius_15 overflow-hidden"><img className="img-fluid" src={globallink.urla+'uploads/post/'+val.featured_image} alt="avatar_01" /></div>
                    <h4 className="fontsize18 fontweightbold">{val.name}</h4>
                    <p><Markup content={val.description} /></p>
                </div>
            </div>
            </>
        )

    }else{
        return(
            <>
            <div className="col-xl-6 px-4 col-lg-12 mb-4 mb-xl-0">
                            <div className="d-inline-block mb-4 w-260px h-260px border_radius_15 overflow-hidden"><img className="img-fluid" src={globallink.urla+'uploads/post/'+val.featured_image} alt="avatar_02" /></div>
                            <h4 className="fontsize18 fontweightbold">{val.name}</h4>
                            <p><Markup content={val.description} /></p>
                        </div>
            </>
        )
        
    }
    
    
})}
                        
                    </div>
                </div>
            </div>
            
            
            
            
            <div className="pb-5">
                <div className="col-xl-11 col-10 mx-auto">
                    <h4 className="fontsize18 fontweightbold">Former Board of Directors</h4>
                    <div className="row gx-0 mt-4">
                        <div className="col-xl-3 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">President</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {PresidentLoopArray.map((val) => {
                                            return (
                                                <PresidentLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 light_greybgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Vice President</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {ViocePresidentLoopArray.map((val) => {
                                            return (
                                                <ViocePresidentLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Treasurer</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {TreasurerLoopArray.map((val) => {
                                            return (
                                                <TreasurerLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 light_greybgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Treasurer</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {SecretaryLoopArray.map((val) => {
                                            return (
                                                <SecretaryLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 light_greybgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Cultural Services</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {CulturalLoopArray.map((val) => {
                                            return (
                                                <CulturalLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Women Services</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {WomenServicesLoopArray.map((val) => {
                                            return (
                                                <WomenServicesLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 light_greybgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Educational Services</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {EducationalLoopArray.map((val) => {
                                            return (
                                                <EducationalLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-3 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Youth Services</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {YouthLoopArray.map((val) => {
                                            return (
                                                <YouthLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-4 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Social Services</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {SocialLoopArray.map((val) => {
                                            return (
                                                <SocialLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-4 col-lg-6 p-3 light_greybgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Internal Communications</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {InternalLoopArray.map((val) => {
                                            return (
                                                <InternalLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                        {/*  */}
                        <div className="col-xl-4 col-lg-6 p-3 paragraph_grey1bgcolor">
                            <h5 className="fontsize16 mb-4 fontweightbold">Finance &Accounts</h5>
                            <div className="table-responsive">
                                <Table className="table-borderless fontsize14">
                                    <tbody>
                                        {FinanceLoopArray.map((val) => {
                                            return (
                                                <FinanceLoop
                                                    key={val.key}
                                                    tdtext1={val.tdtext1}
                                                    tdtext2={val.tdtext2}
                                                />
                                            )
                                        })}
                                    </tbody>
                                </Table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default BoardDirectors;
