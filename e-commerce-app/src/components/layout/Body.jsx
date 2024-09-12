import { Outlet, Route, Routes } from "react-router-dom";
import { NoMatch, HomePage } from "../../pages";

const Body = () => {

    return (
        <>
            <Routes>
                <Route path="/home" element={< HomePage />} />
                <Route path="*" element={< NoMatch />} />
            </Routes>
            <Outlet />
        </>
    )
};

export default Body;