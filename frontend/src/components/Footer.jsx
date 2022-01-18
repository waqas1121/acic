import React,{useState,useEffect} from 'react';
import { NavLink } from 'react-router-dom';
import globallink from '../components/Globalurl';
import { Nav, Form, Button } from 'react-bootstrap';
import axios from 'axios';
import context from 'react-bootstrap/esm/AccordionContext';
import { Markup } from 'interweave';

// 
import logo from "../images/logo.svg";
import facebook from "../images/facebook.svg";
import twitter from "../images/twitter.svg";
import instagram from "../images/instagram.svg";
import pinterest from "../images/pinterest.svg";
import phone from "../images/phone.svg";
import email from "../images/email.svg";
import address from "../images/address.svg";


const Footer = () => {


    const submit_footer=(e)=>{ 
        
        // e.prevent_default();
        e.preventDefault();
        e.target.reset();

        const answer = window.confirm("Message Sent Successfully");
        
        axios.post(globallink.url+'contact',{
            
     email:e.target.elements.email.value,
     fname:e.target.elements.fname.value,
     subject:e.target.elements.subject.value,
     msg:e.target.elements.msg.value,

    });
   
    
    }
    const [content,setcontent]=useState('')
    const [phonee,setphone]=useState('')
    const [adreses,setadress]=useState('')


       
    useEffect(() => {

        axios
          .get(globallink.url+'live-stream')
          .then(response => {
           // setmanageleads({manageleads_array:response.data.cms});
           setcontent(response.data.livestream.email);
           setphone(response.data.livestream.phone);
           setadress(response.data.livestream.adress);

        });
          
      }, []);
      
    return (
        <>
            <div className="footer" id="contact">
                
                <div className="col-xl-11 col-11 mx-auto py-5">
                    <div className="row align-items-center">
                        <div className="col-xl-3 col-lg-12 mb-4 mb-xl-0">
                            <NavLink to="/" className="mb-4 d-inline-block"><img width="210" className="img-fluid" src={logo} alt="logo" /></NavLink>
                            <p className="maintextcolor fontsize20">Afghan Canadian Islamic Community (ACIC) is a non-profit charitable organization providing cultural, social and religious.</p>
                            <div className="mt-3 d-inline-flex align-items-center">
                                <Nav.Link href="https://www.facebook.com/afghancanadians/" className="" target="_blank"><img className="img-fluid" src={facebook} alt="facebook" /></Nav.Link>
                                <Nav.Link href="https://twitter.com/afghancanada" className="" target="_blank"><img className="img-fluid" src={twitter} alt="twitter" /></Nav.Link>
                                <Nav.Link href="#" className="" target="_blank"><img className="img-fluid" src={instagram} alt="instagram" /></Nav.Link>
                                <Nav.Link href="#" className="" target="_blank"><img className="img-fluid" src={pinterest} alt="pinterest" /></Nav.Link>
                            </div>
                        </div>
                        <div className="col-xl-6 col-lg-12 mb-4 mb-xl-0 text-center">
                            <h4 className="fontsize26 mb-4 fontweightregular text-uppercase maintextcolor">Stay in Touch</h4>
                            <div className="card-body bg-white border_radius_15 shadow-sm f-form">
                                <Form onSubmit={submit_footer}>
                                    <div className="row">
                                        <div className="col-xl-4 mb-3 mb-xl-0">
                                            <Form.Control type="email" className="" name="email" id=""  placeholder="E-mail" ></Form.Control>
                                        </div>
                                        <div className="col-xl-4 mb-3 mb-xl-0">
                                            <Form.Control type="text" className="" name="fname" id="" placeholder="Name"></Form.Control>
                                        </div>
                                        <div className="col-xl-4 mb-3 mb-xl-0">
                                            <Form.Control type="text" className="" name="subject" id="" placeholder="Subject"></Form.Control>
                                        </div>
                                        <div className="col-xl-12 my-4">
                                            <Form.Control as="textarea" name="msg" placeholder="Message" rows={5} />
                                        </div>
                                    </div>
                                    <Button type="submit" className="mainbgcolor border_radius_100 px-4 text-white fontsize14 d-flex justify-content-start" variant="">Submit</Button>
                                </Form>
                            </div>
                        </div>
                        <div className="col-xl-3 col-lg-12 mb-0">
                            <h5 className="fontsize32 mb-4 fontweightbold text-uppercase maintextcolor">Contact Info</h5>
                            <p className="maintextcolor fontsize20 d-flex align-items-center"><img className="img-fluid me-3" src={phone} alt="phone" /> <Markup content={phonee} /></p>
                            <p className="maintextcolor fontsize20 d-flex align-items-center"><img className="img-fluid me-3" src={email} alt="phone" /> <Markup content={content} /></p>
                            <p className="maintextcolor fontsize20 d-flex align-items-center"><img className="img-fluid me-3" src={address} alt="phone" /> <Markup content={adreses} /></p>
                        </div>
                    </div>
                </div>
                {/*  */}
                <div className="copyright mt-4">
                    <div className="col-xl-11 col-11 mx-auto">
                        <p className="text-center m-0 text-xl-start">Copyright © 2021 - Afghan Canadian Islamic Community - All right reserved <NavLink to="#" className="btn_underlined d-inline-block px-2">Privacy Policy</NavLink> / <NavLink to="#" className="btn_underlined d-inline-block px-2">Terms & Conditions </NavLink></p>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Footer;
