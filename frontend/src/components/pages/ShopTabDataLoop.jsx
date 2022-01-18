import React from 'react';

const ShopTabDataLoop = (props) => {
    return (
        <>
            <div className="col-xl-3 text-center col-lg-6 mb-4">
                <p className="mb-3"><img className="img-fluid" src={props.shop_product} alt="product" /></p>
                <h6 className="greentextcolor fontsize22">Nowroz gift basket</h6>
                <p className="m-0 fontsize20 redtextcolor">$10.00 </p>
            </div>
        </>
    )
}

export default ShopTabDataLoop;
