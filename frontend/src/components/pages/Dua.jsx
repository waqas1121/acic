import React from 'react';
import { NavLink } from 'react-router-dom';

const Dua = () => {
    return (
        <>
            <div className="dua">
                <div className="col-xl-11 col-11 mx-auto">
                    {/* <h4>Obituary</h4>
                    <h6>Innalillahi Wa Inna Ilayhi Raaji’oon</h6>
                    <p className="fontsize22">“Surely  we belong to God, and indeed to him we shall return.”(Al-Baqarah 2:156)</p> */}
                    <div className="my-5 row">
                                               
                        <ul className="cate list-unstyled">
                            <li><NavLink to="dua-jawshan"> Dua Jawshan Kabeer</NavLink></li>
                            <li><NavLink to="dua-kumayl"> Dua-e-Kumayl</NavLink></li>
                        </ul>


                        
                    </div>
                    
                </div>
            </div>
        </>
    )
}

export default Dua;
