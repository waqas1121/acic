import React from 'react';
import { Form } from "react-bootstrap";


const RadioDataLoop = (props) => {
    return (
        <>
            <div className="d-flex align-items-start mb-4">
                <Form.Check className="me-2" type="radio" name="radio1" aria-label="radio 1" />
                <div className="w-100">
                    <h5 className="fontweightmeduim fontsize14 mb-1">{props.title}</h5>
                    <p className="m-0 fontsize14 paragraph_greytextcolor">{props.paragraph}</p>
                </div>
            </div>
        </>
    )
}

export default RadioDataLoop;
