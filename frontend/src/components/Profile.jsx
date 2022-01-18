import React,{useState,useEffect} from 'react';
import { Col, Row, Button, Form } from "react-bootstrap";
import { NavLink,useHistory } from 'react-router-dom';
import { ToastContainer, toast } from 'react-toastify';
 import 'react-toastify/dist/ReactToastify.css';

import axios from 'axios';
import globallink from "../components/Globalurl";
const Profile = () => {
    


    const history = useHistory()
    const[DisplayName,setDisplayName] = useState('')
    const[memberid,setid] = useState('')
    const[fname,setFirstName] = useState('')
    const[lname,setLastName] = useState('');
    const[email,setEmail] = useState('');

    const[Membername,setMembername] = useState('');
    let obj = JSON.parse(localStorage.getItem('data'));
    // 
    useEffect(() => {
        window.scrollTo(0, 0);

        if(obj == null){
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
            setMembername(response.data.Name);
            
           })
        }
        
    }, []);
    
    return (
        <>
            <div className='py-5'>
                <Col xxl={10} xl={10} lg={12} md={12} className='mx-auto col-12'>
                    <div className='text-center fontsize26 fontweightbold mb-4'>My Profile</div>
                    <Col xxl={8} xl={8} lg={12} md={12} className='mx-auto col-12'>
                        <Form>
                            <Row className='profile_form paragraph_grey1bgcolor border_radius_10'>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id="" value={fname}></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id="" value={lname}></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id="" value={DisplayName}></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="email" className="" name="" id="" value={email}></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="phone" className="" name="" id="" ></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id="" ></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id=""></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4'>
                                    <Form.Control type="text" className="" name="" id=""></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12 mb-4 mb-md-0'>
                                    <Form.Control type="number" className="" name="" id="" ></Form.Control>
                                </Col>
                                <Col xxl={6} xl={6} lg={6} md={6} className='col-12'>
                                    <Form.Control type="number" className="" name="" id=""></Form.Control>
                                </Col>
                                <div className='d-inline-block text-end mt-4'><Button variant="" className='btn_login text-center'>Submit</Button></div>
                            </Row>
                        </Form>
                    </Col>
                </Col>
            </div>
        </>
    )
}

export default Profile;
