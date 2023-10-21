import * as React from "react";
import { styled } from "@mui/material/styles";
import MaterialUIButton from "@mui/material/Button";

export interface IButtonProps {
  disabled?: boolean;
  variant?: "outlined" | "contained" | "text";
  handleClick?: () => void;
  size?: "small" | "medium" | "large";
  color?:
    | "inherit"
    | "primary"
    | "secondary"
    | "success"
    | "error"
    | "info"
    | "warning";
  startIcon?: React.ReactNode;
  endIcon?: React.ReactNode;
  type?: "button" | "submit" | "reset";
}

export const Button: React.FC<React.PropsWithChildren<IButtonProps>> = ({
  children,
  handleClick = () => {},
  disabled = false,
  size = "small",
  color = "primary",
  variant = "contained",
  startIcon,
  endIcon,
  type = "button",
}) => {
  const CustomOutlinedButton = styled(MaterialUIButton)({
    borderRadius: "6px",
    textTransform: "capitalize",
    padding: "0.4em 0",
    fontFamily: "'Chivo', sans-serif",
  });

  return (
    <CustomOutlinedButton
      onClick={handleClick}
      variant={variant}
      disabled={disabled}
      size={size}
      color={color}
      startIcon={startIcon}
      endIcon={endIcon}
      type={type}
    >
      {children}
    </CustomOutlinedButton>
  );
};
