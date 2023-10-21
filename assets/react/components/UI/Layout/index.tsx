import React, {useEffect, useState} from "react";
import { Outlet } from "react-router-dom";
import { Navbar } from "../Navbar";

export const Layout: React.FC = () => {
    const [isOpen, setIsOpen] = useState(false);
    const [isDesktop, setIsDesktop] = useState(false);

    useEffect(() => {
      const screenWidth = window.innerWidth;
      if (screenWidth < 1024) {
        setIsDesktop(false);
      }
      if (screenWidth >= 1024) {
        setIsDesktop(true);
      }
    }, []);

    const links = [
      {
        to: "/react/compte",
        children: "compte",
        classNameActive: "active",
        classNameDisabled: "disabled",
      },
      {
        to: "/react/voeux",
        children: "voeux",
        classNameActive: "active",
        classNameDisabled: "disabled",
      },
      {
        to: "/react/historique",
        children: "historique",
        classNameActive: "active",
        classNameDisabled: "disabled",
      },
    ];
  
    const toggleDrawer = (open: boolean): void => {
      setIsOpen(open);
    };

  return <div>
      <Navbar toggleDrawer={toggleDrawer} open={isOpen} links={links} />
      <div className={isDesktop ? "container_desktop" : ""}>
        <Outlet />
      </div>
  </div>
};
