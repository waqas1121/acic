import React from 'react';
import { NavLink } from 'react-router-dom';

const Membership = () => {
    return (
        <>
            <div className="py-5 gx-0 membership">
                <div className="col-xl-11 col-11 mx-auto">
                    <div className="text-center">
                    <NavLink to={`${process.env.PUBLIC_URL}/renew_membership`} className="mainbgcolor border_radius_100 btn d-inline-block text-white px-4 me-3">Renew Membership</NavLink>
                    <NavLink to={`${process.env.PUBLIC_URL}/become_membership`} className="goldenbgcolor border_radius_100 btn d-inline-block text-white px-4">Become a Member</NavLink>
                    </div>
                    <p className="fontweightbold"> Membership</p>
                    <p>ACIC membership is available only to individuals interested in furthering the objectives of the organization, aged 18+, who have applied and have been accepted for membership in the Corporation by the Board of Directors.</p>
                    <p className="fontweightbold">Membership Conditions</p>
                    <p>All members are required to obey the ACIC by-law, resolutions passed by the general meetings and written policies of the ACIC.</p>
                    <p>In the case of termination of membership, whether by resignation or expulsion, a member shall remain liable for payment of any arrears which become payable by him/her to the organization at the time of termination.</p>
                    <p>The Board has the authority to suspend or expel any member from the Corporation for any one or more of the following grounds: violating any provision of the articles, by-laws or written policies of the organization ; carrying out any conduct which may be detrimental to the Organization  as determined by the Board in its sole discretion; and for any other reason that the board in its sole and absolute discretion considers to be reasonable, having regard to the purpose of the organization.</p>
                    <p><strong>Note:</strong> Only the general meeting has the authority to restore the status of a suspended member if the suspended member appeals in a general meeting following a suspension by the Board of Directors: </p>
                    <p className="fontweightbold">Membership Classes</p>
                    <p>There are two classes of members in the ACIC:</p>
                    <p className="fontweightbold">Class “A” Member</p>
                    <p> A Class “A” member is entitled to vote in the general meetings and can be nominated for a position on the Board of Directors after three years of membership</p>
                    <p className="fontweightbold">Class “B” Member</p>
                    <p>A Class “B” member is non-voting member; however, he/she will automatically be converted to a Class “A” voting member following one full year of membership as a Class B non-voting member.</p>
                    <p className="fontweightbold">Membership Fee</p>
                    <p>The membership fee is fixed by resolution of the Board and sanctioned by a majority vote at a general meeting of members. Currently, annual membership fees are as follows:</p>
                    <p> $600 for family membership.</p>
                    <p><strong>Note:</strong> A family membership fee covers parents and their children under 18. Children older than 18 or other relatives of the applicants such as father or mother, no matter if they live in the same house, should pay a separate membership fee.</p>
                    <p>Single membership fee: $300</p>
                    <p className="fontweightbold">Membership Benefits</p>
                    <p>All Class “A” Members whose membership has not been suspended are entitled to receive the following benefits as determined by resolution of the Board and sanctioned by a majority vote at a general meeting of members:</p>
                    <ul className="my-4 list-unstyled">
                        <li>Right to vote in the annual general meetings or any special general meeting.</li>
                        <li>Right to be nominated for a position on the Board of Directors after three years from membership.</li>
                        <li> A 50% discount on school fees (tuition fee only; books and other educational materials are excluded.)</li>
                        <li>  Free funeral and burial service for the principal member or any family member (family members include husband, wife and children under age 18)</li>
                    </ul>
                    <p><strong>Note:</strong> To be entitled to these benefits, all membership dues should have been paid on time.</p>
                    <div className="text-center mt-5">
                    <div className="text-center">
                        <NavLink to={`${process.env.PUBLIC_URL}/renew_membership`} className="mainbgcolor border_radius_100 btn d-inline-block text-white px-4 me-3">Renew Membership</NavLink>
                        <NavLink to={`${process.env.PUBLIC_URL}/become_membership`} className="goldenbgcolor border_radius_100 btn d-inline-block text-white px-4">Become a Member</NavLink>
                    </div>
                    </div>
                </div>
            </div>
        </>
    )
}

export default Membership;
