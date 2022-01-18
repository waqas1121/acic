import React from 'react';

const PrayerTimeData = (props) => {
    return (
        <>
            <tr className="highlight">
                <td>{props.name}</td>
                <td className="text-center"><img className="img-fluid" src={props.image} alt="moon" /></td>
                <td>{props.time}</td>
            </tr>
        </>
    )
}

export default PrayerTimeData;
