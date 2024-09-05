import { Outlet, Route, Routes } from "react-router-dom";
import { NoMatch } from "../../pages";

const Body = () => {

    return (
        <>
            <Routes>
                <Route path="*" element={< NoMatch />} />
            </Routes>
            <Outlet />
        </>
    )
};

export default Body;