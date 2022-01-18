import React, { useState,useEffect } from 'react';
import { Col, Nav } from "react-bootstrap";
import { NavLink,useHistory } from 'react-router-dom';
import { ToastContainer, toast } from 'react-toastify';
  import 'react-toastify/dist/ReactToastify.css';
import axios from 'axios';
// images import
import logo from "../../images/logo.svg";
import globallink from "../Globalurl";

const MembershipDetail = () => {
    // 
    const history = useHistory()
    const[DisplayName,setDisplayName] = useState('')
    const[memberid,setid] = useState('')
    const[fname,setFirstName] = useState('')
    const[lname,setLastName] = useState('');
    const[email,setEmail] = useState('');
    const[phone,setphone] = useState('');


    const[Membername,setMembername] = useState('');
    let obj = JSON.parse(localStorage.getItem('data'));
    useEffect(() => {
        window.scrollTo(0, 0);

dfgfg

        if(obj === null){
            setTimeout(() => { 
                history.push(`${process.env.PUBLIC_URL}/login`);
                window.location.reload();
            }, 3000)
           //window.location.reload(`${process.env.PUBLIC_URL}/login`);
           toast.error('Login Again Token Expire');

        }else{
            axios
           .post(globallink.url+'profile',{
               token : obj.access_token,
               AccountId : obj.Permissions[0].AccountId
   
           })
           .then( response => {
            setDisplayName(response.data.DisplayName);
            setid(response.data.Id);
            setFirstName(response.data.FirstName);
            setLastName(response.data.LastName);
            setEmail(response.data.Email);
            setMembername(response.data.Organization);
            setphone(response.data.Phone);

            axios
           .post(globallink.url+'viewpkg',{
               token : obj.access_token,
               AccountId : obj.Permissions[0].AccountId,
               Memid : response.data.Id
   
           })
           .then( response => {

           })

            
           })
           
        }
    }, []);
    return (
        <>
        
            <div className='py-5'>
                <Col xxl={10} xl={10} lg={12} md={12} className='mx-auto col-12'>
                
                
                    <NavLink to={`${process.env.PUBLIC_URL}/profile`} className='mb-3 d-block goldentextcolor fontsize14 text-center fontweightbold text-decoration-underline'>Edit Profile</NavLink> 
                
                    <Col xxl={8} xl={8} lg={11} md={11} className='mx-auto col-11'>
                        <div className='paragraph_grey1bgcolor p-3 border_radius_10'>
                            <div className='border_radius_10 col-xxl-4 mb-3 col-9 text-center p-3 mx-auto bodybgcolor'>
                                <NavLink to="" className='mb-3 d-block'><img width="200" className='img-fluid' src={logo} alt='icon' /></NavLink>
                                <small className='m-0 d-block paragraph_greytextcolor'>Member ID: <strong>{memberid}</strong></small>
                                {/* <small className='m-0 d-block paragraph_greytextcolor'>Valid Until: <strong>Sunday, January 01, 2023</strong></small> */}
                            </div>
                            {/* <NavLink to="" className='mb-3 d-block goldentextcolor fontsize14 text-center fontweightbold text-decoration-underline'>Image Optimized for smartphones printable PDF</NavLink> */}
                            <div className='px-2 py-3'>
                                <div className='d-md-flex align-items-start mb-3'>
                                    <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Membership Level</strong></h5>
                                    <div className='ms-md-3'>
                                        <p className='fontsize14 m-0'>{Membername} - $600.00 (CAD) <NavLink to={`${process.env.PUBLIC_URL}/membership-level`} className="text-decoration-underline goldentextcolor fontweightbold">Change</NavLink></p>
                                        <i className='d-block fontsize14 paragraph_greytextcolor'>Subscription period: <strong>1Year</strong>. No automatically Recurring payments</i>
                                    </div>
                                </div>
                                {/*  */}
                                <div className='d-md-flex align-items-start mb-3'>
                                    <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Membership Status</strong></h5>
                                    <div className='ms-md-3'>
                                        <p className='fontsize14 m-0'>Active</p>
                                    </div>
                                </div>
                                {/*  */}
                                <div className='d-md-flex align-items-start'>
                                    <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Membership Since</strong></h5>
                                    <div className='ms-md-3'>
                                        <p className='fontsize14 m-0'></p>
                                    </div>
                                </div>
                                {/*  */}
                                <div className='d-md-flex align-items-start mb-3'>
                                    <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Renewal due on</strong></h5>
                                    <div className='ms-md-3'>
                                        <p className='fontsize14 m-0'></p>
                                    </div>
                                </div>
                            </div>
                            {/*  */}
                            <div className='text-center mb-3'><p className='d-inline-block mainbgcolor text-white btn m-0'>Renew to Monday, January 01, 2024</p></div>
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Membership</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'>{memberid}</p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>First Name</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'>{fname}</p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Last Name</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'>{lname}</p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Spouse Full Name</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'>{fname} {lname}</p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Email</strong></h5>
                                <div className='ms-md-3'>
                                    <Nav.Link href="mailto:{email}" className='goldentextcolor fontweightbold p-0 fontsize14 m-0'>{email}</Nav.Link>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Phone Number</strong></h5>
                                <div className='ms-md-3'>
                                    <Nav.Link href="tel:4168302680" className='goldentextcolor fontweightbold p-0 fontsize14 m-0'>{phone}</Nav.Link>
                                </div>
                            </div>
                            
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Street</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'></p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>City</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'></p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Province</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'></p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Postal Code</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'></p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Payment Method</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'></p>
                                </div>
                            </div>
                            {/*  */}
                            <div className='d-md-flex align-items-start mb-3'>
                                <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Children Under the age of 18 full name</strong></h5>
                                <div className='ms-md-3'>
                                    <p className='fontsize14 m-0'>Elyas Maysam Sajjad Maysam</p>
                                </div>
                            </div>
                        </div>
                    </Col>

                </Col>
            </div>
        </>
    )
}

export default MembershipDetail;
