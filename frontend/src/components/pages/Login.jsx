import React,{useState,useEffect} from 'react';
import { Form, InputGroup, FormControl, FormLabel, Button } from "react-bootstrap";
import { NavLink,useHistory } from "react-router-dom";
//
import vector_bg from "../../images/vector_logo_1.svg";
import user from "../../images/user.svg";
import passim from "../../images/pass.svg";
import facebook_circles from "../../images/facebook_circles.svg";
import twitter_cicles from "../../images/twitter_cicles.svg";
import google from "../../images/google.svg";
import axios from 'axios';
import globallink from "../Globalurl";
import { Markup } from 'interweave';
import DOMPurify from 'dompurify';

import { ToastContainer, toast } from 'react-toastify';
  import 'react-toastify/dist/ReactToastify.css';

const Login = () => {
    const history = useHistory()
    const [loginaray,setloginaray]=useState('');
    const [username,setusername]=useState('');
    const [pass,setpass]=useState('');

    

    
    
      const submitform = (e) => {
        axios
        .post(globallink.url+'login',{
            uname : username,
            upass : pass
        })
        .then( response => {
            //setloginaray(response.login.ate);
            localStorage.setItem('data',JSON.stringify(response.data.data));
            
            let obj = JSON.parse(localStorage.getItem('data'));
            //var companyid = obj.company_id;
            //alert(obj.access_token);
            
            toast.success('You are successfully logged in');

            
            // setTimeout(() => { 
            //     history.push(`${process.env.PUBLIC_URL}/`);
            // }, 3000)
            // window.location.reload(`${process.env.PUBLIC_URL}/`);
            window.location.href=`${process.env.PUBLIC_URL}/membership-detail`
        })
        .catch(error => {
            toast.error(error.response.data.error);
        });


        e.preventDefault();
      }
    return (
        <>
        
        <div className="col-xl-11 col-11 mx-auto my-5">
                <div className="border_radius_100 overflow-hidden bg-white shadow_card">
                    <div className="d-flex row gx-0 align-items-center">
                        <div className="col-xl-6">
                            <div className="card-body py-5 login_form px-5 h-100">
                                <h4 className="maintextcolor fontsize32 mb-5 fontweightbold text-center">Login</h4>
                                
                                <ToastContainer />
                                <Form id="main-login" onSubmit={submitform}>
                                    <FormLabel className="d-block mb-4">Username</FormLabel>
                                    <InputGroup className="mb-4">
                                        <InputGroup.Text id="basic-addon1"><img className="img-fluid" src={user} alt="user" /></InputGroup.Text>
                                        <FormControl type="text" name="uname" required value={username} onChange={(e) => setusername(e.target.value)} placeholder="Type your username" aria-label="Username" />
                                    </InputGroup>
                                    <FormLabel className="d-block mb-4">Password</FormLabel>
                                    <InputGroup className="mb-4">
                                        <InputGroup.Text id="basic-addon2"><img className="img-fluid" src={passim} alt="user" /></InputGroup.Text>
                                        <FormControl type="password" name="upass" required value={pass} onChange={(e) => setpass(e.target.value)}  placeholder="Type your Password" aria-label="Password" />
                                    </InputGroup>
                                    {/* <NavLink to="/forgot_password" className="paragraph_greytextcolor d-flex fontsize16 text-end nav-link justify-content-end">Forgot password?</NavLink> */}
                                    <Button type="submit" variant="" className="mainbgcolor border_radius_100 mb-4 text-white text-uppercase fontsize22 w-75 mx-auto mt-5 h-60px d-block">Login</Button>
                                    {/* <p className="text-center fontsize22 paragraph_greytextcolor fontweightlight">Or Signup Using</p> */}
                                    {/* <div className="d-flex align-items-center justify-content-center mb-5">
                                        <NavLink to="#" className=""><img className="img-fluid" src={facebook_circles} alt="facebook" /></NavLink>
                                        <NavLink to="#" className="px-4"><img className="img-fluid" src={twitter_cicles} alt="twitter" /></NavLink>
                                        <NavLink to="#" className=""><img className="img-fluid" src={google} alt="google" /></NavLink>
                                    </div> */}
                                    {/* <p className="text-center fontsize22 m-0 paragraph_greytextcolor fontweightlight">Or Signup Using</p>
                                    <NavLink to="/signup" className="paragraph_greytextcolor d-flex fontsize20 text-end nav-link fontweightbold justify-content-center">Sign Up</NavLink> */}
                                </Form>
                            </div>
                        </div>
                        <div className="col-xl-6">
                            <div className="card-body bg_vector p-4"><img className="img-fluid" src={vector_bg} alt="vectorbg" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Login;
