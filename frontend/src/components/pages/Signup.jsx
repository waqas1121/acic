import React from 'react';
import { Form, InputGroup, FormControl, FormLabel, Button } from "react-bootstrap";
import { NavLink } from "react-router-dom";

const Signup = () => {
    return (
        <>
            <div className="col-xl-8 col-9 mx-auto my-5">
                <div className="border_radius_100 overflow-hidden bg-white shadow_card">
                    <div className="card-body py-5 signup_form px-5 h-100">
                        <h4 className="maintextcolor fontsize32 mb-5 fontweightbold text-center">Signup</h4>
                        <Form className="row">
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block fontsize18 mb-2">First Name</FormLabel>
                                <InputGroup><FormControl type="text" name="" placeholder="Type your username" aria-label="Username" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block fontsize18 mb-2">Last Name</FormLabel>
                                <InputGroup><FormControl type="text" name="" placeholder="Type your username" aria-label="Username" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block mb-2">E-Mail</FormLabel>
                                <InputGroup><FormControl type="email" name="" placeholder="Type your email" aria-label="email" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block mb-2">Phone</FormLabel>
                                <InputGroup><FormControl type="number" name="" placeholder="Type your phone number" aria-label="phone" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block mb-2">City</FormLabel>
                                <InputGroup><FormControl type="text" name="" placeholder="Type your city name" aria-label="city" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block mb-2">Province</FormLabel>
                                <InputGroup><FormControl type="text" name="" placeholder="Type your province" aria-label="name" /></InputGroup>
                            </div>
                            <div className="col-xl-6 col-lg-12 mb-4">
                                <FormLabel className="d-block mb-2">Postal Code</FormLabel>
                                <InputGroup><FormControl type="text" name="" placeholder="Type your postal code" aria-label="code" /></InputGroup>
                            </div>
                            <div className="col-xl-12 col-lg-12 mb-4">
                                <Button to="#" variant="" className="mainbgcolor border_radius_100 mb-4 text-white text-uppercase fontsize22 w-50 mx-auto mt-5 h-60px d-block">Signup</Button>
                                <p className="text-center fontsize22 m-0 paragraph_greytextcolor fontweightlight">Back To Login</p>
                                <NavLink to="/login" className="paragraph_greytextcolor d-flex fontsize20 text-end nav-link fontweightbold justify-content-center">Login</NavLink>
                            </div>
                        </Form>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Signup;
