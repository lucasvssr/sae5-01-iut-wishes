import Box from "@mui/material/Box";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import SwipeableDrawer from "@mui/material/SwipeableDrawer";
import React, { useState, useEffect } from "react";
import { Link, useLocation } from "react-router-dom";
import { Button } from "../Button";
import MenuIcon from "@mui/icons-material/Menu";

export interface INavbarProps {
  links: Array<{
    to: string;
    children: string;
    classNameActive: string;
    classNameDisabled: string;
  }>;
  open: boolean;
  toggleDrawer: (open: boolean) => void;
}

export const Navbar: React.FC<INavbarProps> = ({
  links,
  toggleDrawer,
  open,
}) => {
  const location = useLocation();

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

  return isDesktop ? (
    <Box
      className="navbar_desktop"
      onClick={() => {
        toggleDrawer(false);
      }}
      onKeyDown={() => {
        toggleDrawer(false);
      }}
    >
      <List>
        {links.map((link) => {
          return (
            <ListItem key={link.to} disablePadding>
              <Link
                key={link.to}
                to={link.to}
                className={`navbar__link ${
                  location.pathname === link.to ? "navbar__link_active" : ""
                }`}
              >
                {link.children}
              </Link>
            </ListItem>
          );
        })}
      </List>
      <div className="navbar__support">
        <Link to="/react/conditions">Conditions d’utilisation</Link>
        <Link to="/react/support">Contacter le support </Link>
      </div>
    </Box>
  ) : (
    <>
      <div className="burger">
        <Button
          variant="text"
          handleClick={() => {
            toggleDrawer(!open);
          }}
          startIcon={<MenuIcon />}
        ></Button>
      </div>

      <SwipeableDrawer
        disableBackdropTransition={true}
        anchor={"left"}
        open={open}
        onClose={() => {
          toggleDrawer(false);
        }}
        onOpen={() => {
          toggleDrawer(true);
        }}
      >
        <Box
          className="navbar"
          onClick={() => {
            toggleDrawer(false);
          }}
          onKeyDown={() => {
            toggleDrawer(false);
          }}
        >
          <List>
            {links.map((link) => {
              return (
                <ListItem key={link.to} disablePadding>
                  <Link
                    key={link.to}
                    to={link.to}
                    className={`navbar__link ${
                      location.pathname === link.to ? "navbar__link_active" : ""
                    }`}
                  >
                    {link.children}
                  </Link>
                </ListItem>
              );
            })}
          </List>
          <div className="navbar__support">
            <Link to="/react/conditions">Conditions d’utilisation</Link>
            <Link to="/react/support">Contacter le support </Link>
          </div>
        </Box>
      </SwipeableDrawer>
    </>
  );
};
