import React from 'react';
import { Form, InputGroup, FormControl, FormLabel, Button } from "react-bootstrap";
//
import vector_bg from "../../images/vector_logo_1.svg";
import user from "../../images/user.svg";

const Forgot = () => {
    return (
        <>
            <div className="col-xl-11 col-11 mx-auto my-5">
                <div className="border_radius_100 overflow-hidden bg-white shadow_card">
                    <div className="d-flex row gx-0 align-items-center">
                        <div className="col-xl-6">
                            <div className="card-body py-5 login_form px-5 h-100">
                                <h4 className="maintextcolor fontsize32 mb-5 fontweightbold text-center">Forgot</h4>
                                <Form>
                                    <FormLabel className="d-block mb-4">Email</FormLabel>
                                    <InputGroup className="mb-4">
                                        <InputGroup.Text id="basic-addon1"><img className="img-fluid" src={user} alt="user" /></InputGroup.Text>
                                        <FormControl type="text" name="" placeholder="Type your email" aria-label="Username" />
                                    </InputGroup>
                                    <Button to="#" variant="" className="mainbgcolor border_radius_100 mb-4 text-white text-uppercase fontsize22 w-75 mx-auto mt-5 h-60px d-block">Reset</Button>
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

export default Forgot;
