import React, { useState,useEffect } from 'react';
import { NavLink,useHistory } from 'react-router-dom';
import Offcanvas from 'react-bootstrap/Offcanvas';
import OffcanvasHeader from 'react-bootstrap/OffcanvasHeader';
import OffcanvasTitle from 'react-bootstrap/OffcanvasTitle';
import OffcanvasBody from 'react-bootstrap/OffcanvasBody';
import { Button, Navbar, NavItem, Form, Nav, Dropdown, InputGroup } from "react-bootstrap";
import globallink from "../components/Globalurl";
// images import
import homeicon from "../images/home_icon.svg";
import search_icon from "../images/search_icon.svg";
import logo from "../images/logo.svg";
import bar from "../images/bar.svg";
import { ToastContainer, toast } from 'react-toastify';
  import 'react-toastify/dist/ReactToastify.css';
import axios from 'axios';


const Header = () => {
    const history = useHistory()
    const options = [
        {
            name: <img className="img-fluid" src={bar} alt="bar" />,
            scroll: true,
            backdrop: false,
        },
    ];

    const Logout = (e) => {
        e.preventDefault();
        localStorage.clear();
        
         setTimeout(() => { 
             history.push(`${process.env.PUBLIC_URL}/login`);
             window.location.reload();
         }, 3000)
        //window.location.reload(`${process.env.PUBLIC_URL}/login`);
        toast.error('You are logged out');

    }

    let obj = JSON.parse(localStorage.getItem('data'));

    const googleTranslateElementInit = () => {
        new window.google.translate.TranslateElement({ pageLanguage: 'en',includedLanguages: 'en,fa' }, 'google_translate_element')
       }
       
       useEffect(() => {
         var addScript = document.createElement('script');
         addScript.setAttribute('src', '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit');
         document.body.appendChild(addScript);
         window.googleTranslateElementInit = googleTranslateElementInit;
         
       }, []);
    

       
    return (
        <>
            <div className="top_bar">
                <div className="col-xl-11 col-11 mx-auto">
                <ToastContainer />
                    <Form className="py-3">
                        <div className="d-lg-flex align-items-center">
                            <NavLink className="text-center home d-block mb-3 mb-lg-0" exact to={`${process.env.PUBLIC_URL}/`}><img className="img-fluid" src={homeicon} alt="home icon" /></NavLink>
                            <div className="ms-auto d-md-flex align-items-center">
                                <InputGroup size="md" className="mb-0 me-3">
                                    <Form.Control className="" placeholder="Search" name="" type="text" aria-describedby="inputGroup-sizing-sm" />
                                    <InputGroup.Text id="inputGroup-sizing-sm"><img className="img-fluid" src={search_icon} alt="search icon" /></InputGroup.Text>
                                </InputGroup>

                                {obj == null ? 
                                 <NavLink to={`${process.env.PUBLIC_URL}/login`} className="me-3 btn btn_login">Login</NavLink>
                                :
                                
                                <Dropdown autoClose="outside">
                                    <Dropdown.Toggle variant="" className='me-3 btn_login' id="dropdown-basic">Manage Profile</Dropdown.Toggle>
                                    <Dropdown.Menu placement="start">
                                        <Dropdown.Item href={`${process.env.PUBLIC_URL}/membership-detail`}>Profile</Dropdown.Item>
                                        <Dropdown.Item href="#" onClick={Logout} >Logout</Dropdown.Item>
                                    </Dropdown.Menu>
                                </Dropdown>
                                }
                                
                                <div id="google_translate_element"></div>
                                
                                
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
            {/*  */}
            <div className="navbar_header sticky-top bg-white">
                <div className="col-xl-11 col-11 mx-auto">
                    <Navbar className="p-0 align-items-center d-none d-xl-flex">
                        <div className="me-auto justify-content-between d-flex align-items-center w-100">
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/membership`} className="nav-link">Membership</NavLink></NavItem>
                            {/* <NavItem><NavLink to="/services" className="nav-link">Services</NavLink></NavItem> */}
                            <Dropdown>
                                <Dropdown.Toggle variant="" id="dropdown-basic">Services</Dropdown.Toggle>
                                <div className="dropdown-menu">
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/school`}>Educational Services</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/funeral_and_burial`}>Funeral And Burial</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/cultural`}>Cultural </NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/women_services`}>Women Services</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/youth_services`}>Youth Services</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/empowerment`}>Social Services</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/library`}>Library</NavLink>
                                </div>
                            </Dropdown>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/calendar`} className="nav-link">Calendar</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/publication`} className="nav-link">Publication</NavLink></NavItem>
                            
                        </div>
                        <NavLink to={`${process.env.PUBLIC_URL}/`} className="w-100 text-center py-2"><img width="180" className="img-fluid" src={logo} alt="logo" /></NavLink>
                        <div className="ms-auto justify-content-between d-flex align-items-center w-100">
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/livestream`} className="nav-link">Livestream</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/dua`} className="nav-link"><span>wa</span>Dua</NavLink></NavItem>
                            <Dropdown>
                            <Dropdown.Toggle variant="" id="dropdown-basic">About</Dropdown.Toggle> 
                            <Dropdown.Menu>
                                    {/* <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/#about`}>Our History</NavLink> */}
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/about`}>Our History</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/expansion`}>Expansion Project</NavLink>
                                    <NavLink className="nav-link" to={`${process.env.PUBLIC_URL}/board_directors`}>Board of Directors</NavLink>
                                    
                                </Dropdown.Menu>
                            </Dropdown>
                            <NavItem><Nav.Link href={`${process.env.PUBLIC_URL}/#contact`} className="nav-link">Contact</Nav.Link></NavItem>
                        </div>
                    </Navbar>
                    
                </div>
            </div>
            {/*  */}
            
        </>
    )
}
// 
function OffCanvasExample({ name, ...props }) {
    const [show, setShow] = useState(false);
    const handleClose = () => setShow(false);
    const toggleShow = () => setShow((s) => !s);

    return (
        <>
            <Button variant="" onClick={toggleShow} className="bar_btn btn d-block d-xl-none">{name}</Button>
            <Offcanvas show={show} onHide={handleClose} {...props}>
                <OffcanvasHeader className="bg-white" closeButton>
                    <OffcanvasTitle className="w-100 text-center"><NavLink to={`${process.env.PUBLIC_URL}/`} className="d-block"><img width="150" className="img-fluid" src={logo} alt="logo" /></NavLink></OffcanvasTitle>
                </OffcanvasHeader>
                <OffcanvasBody className="px-0">
                    <Navbar variant="light">
                        <Nav className="w-100 d-block list-unstyled">
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/membership`} className="nav-link">Membership</NavLink></NavItem>
                            {/* <NavItem><NavLink to="/services" className="nav-link">Services</NavLink></NavItem> */}
                            <Dropdown>
                                <Dropdown.Toggle variant="" id="dropdown-basic">Services</Dropdown.Toggle>
                                <Dropdown.Menu>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/school`}>Educational Services</Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/funeral_and_burial`}>Funeral And Burial</Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/cultural`}>Cultural </Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/women_services`}>Women Services</Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/youth_services`}>Youth Services</Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/empowerment`}>Social Services</Dropdown.Item>
                                    <Dropdown.Item to={`${process.env.PUBLIC_URL}/library`}>Library</Dropdown.Item>
                                </Dropdown.Menu>
                            </Dropdown>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/Committees`}>Committees</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/calendar`} className="nav-link">Calendar</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/publication`} className="nav-link">Publication</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/livestream`} className="nav-link">Livestream</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/dua`} className="nav-link">Dua</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/about`} className="nav-link">About</NavLink></NavItem>
                            <NavItem><NavLink to={`${process.env.PUBLIC_URL}/contact`} className="nav-link">Contact</NavLink></NavItem>
                        </Nav>
                    </Navbar>
                </OffcanvasBody>
            </Offcanvas>
            
        </>
    );
}
export default Header;
