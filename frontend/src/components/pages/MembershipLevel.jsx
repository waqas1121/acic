import React from 'react';
import { Col, Form, Button } from "react-bootstrap";

const MembershipLevel = () => {
    return (
        <>
            <div className='py-5'>
                <Col xxl={10} xl={10} lg={12} md={12} className='mx-auto col-12'>
                    <div className='text-center fontsize26 fontweightbold mb-4'>Change Membership Level</div>
                    <Col xxl={8} xl={8} lg={11} md={11} className='mx-auto col-11'>
                        <div className='d-md-flex align-items-center'>
                            <p className='m-0 fontsize14 maintextcolor'>Select membership level</p>
                            <p className='m-0 ms-auto fontsize14 maintextcolor'><span className='redtextcolor fontweightbold'>*</span> Mandatory Fields</p>
                        </div>
                        <hr className='mt-1' />
                        <div className='d-md-flex align-items-start my-3'>
                            <h5 className='m-0 fontsize16 maintextcolor mb-2 mb-lg-0'><strong>Membership Level</strong></h5>
                            <div className='ms-md-3'>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="FamilyAnnually" />
                                    <label class="form-check-label fontsize14" for="FamilyAnnually">
                                        <strong>Family Annually (Pre Authorized - Credit Card) - $600.00 (CAD)</strong>
                                        <p className='m-0 paragraph_greytextcolor'>Subscription period: 1 year Automatic renewal (recurring payments)</p>
                                    </label>
                                </div>
                                {/*  */}
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="FamilyMonthly" />
                                    <label class="form-check-label fontsize14" for="FamilyMonthly">
                                        <strong>Family Monthly (Pre Authorized - Credit Card) - $50.00 (CAD)</strong>
                                        <p className='m-0 paragraph_greytextcolor'>Subscription period: Monthly, on: 1st Automatic renewal (recurring payments)</p>
                                    </label>
                                </div>
                                {/*  */}
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="ndividual" />
                                    <label class="form-check-label fontsize14" for="ndividual">
                                        <strong>ndividual 18+ Annually - $300.00 (CAD)</strong>
                                        <p className='m-0 paragraph_greytextcolor'>Subscription period: 1 year No automatically recurring payments</p>
                                    </label>
                                </div>
                                {/*  */}
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="Individual" />
                                    <label class="form-check-label fontsize14" for="Individual">
                                        <strong>Individual 18+ Annually (Pre Authorized - Credit Card) - $300.00 (CAD)</strong>
                                        <p className='m-0 paragraph_greytextcolor'>Subscription period: 1 year Automatic renewal (recurring payments)</p>
                                    </label>
                                </div>
                                {/*  */}
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="IndividualAuthorized" />
                                    <label class="form-check-label fontsize14" for="IndividualAuthorized">
                                        <strong>Individual 18+ Monthly (Pre Authorized - Credit Card) - $25.00 (CAD)</strong>
                                        <p className='m-0 paragraph_greytextcolor'>Subscription period: Monthly, on: 1st Automatic renewal (recurring payments)</p>
                                    </label>
                                </div>
                            </div>
                            {/*  */}
                        </div>
                    </Col>
                </Col>
            </div>
            {/*  */}
            <div className='py-5'>
                <Col xxl={10} xl={10} lg={12} md={12} className='mx-auto col-12'>
                    <div className='text-center fontsize26 fontweightbold mb-4'>Change Membership Level</div>
                    <Col xxl={8} xl={8} lg={11} md={11} className='mx-auto col-11'>
                        <div className='d-md-flex align-items-center'>
                            <p className='m-0 fontsize14 maintextcolor'>Your Profile</p>
                            <p className='m-0 ms-auto fontsize14 maintextcolor'><span className='redtextcolor fontweightbold'>*</span> Mandatory Fields</p>
                        </div>
                        <hr className='mt-1' />
                        <Form>
                            <div className='row align-items-center mb-3'>
                                <label for="FirstName" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>First Name</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='nemat' name="" id="FirstName" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="LastName" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Last Name</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='Maysam' name="" id="LastName" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="SpouseFullName" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Spouse Full Name</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='Khatera Maysam' name="" id="SpouseFullName" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="Email" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Email</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="email" placeholder='nemat@live.ca' name="" id="Email" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="PhoneNumber" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Phone Number</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="phone" placeholder='4168302680' name="" id="PhoneNumber" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="Street" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Street</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='32 Armitage Cres' name="" id="Street" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="Street" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>City</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='AJAX' name="" id="Street" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="Street" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Province</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='No' name="" id="Street" />
                                </div>
                            </div>
                            {/*  */}
                            <div className='row align-items-center mb-3'>
                                <label for="Street" className='col-lg-2 m-0 fontsize14 fontweightbold maintextcolor mb-2 mb-lg-0'>Postal Code</label>
                                <div className='col-lg-10'>
                                    <input class="form-control" type="text" placeholder='L1T4L1' name="" id="Street" />
                                </div>
                            </div>
                            <div className='text-end'><Button variant="" className='goldenbgcolor text-white'>Update & Next</Button></div>
                        </Form>
                    </Col>
                </Col>
            </div>
        </>
    )
}

export default MembershipLevel;
