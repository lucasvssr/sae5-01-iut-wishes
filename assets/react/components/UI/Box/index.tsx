import * as React from "react";
import { styled } from "@mui/material/styles";
import MaterialUIAlert from "@mui/material/Alert";

export interface IButtonProps {
  severity?: "success" | "error" | "info" | "warning";
  code: "CM" | "TP" | "TD" | "TDM";
}

export const Box: React.FC<React.PropsWithChildren<IButtonProps>> = ({
  code,
  severity,
}) => {
  const CustomOutlinedAlert = styled(MaterialUIAlert)({
    fontFamily: "'Chivo', sans-serif",
    width: "2.7rem",
    height: "30px",
    padding: "0",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
  });

  if (code === "CM") {
    severity = "success";
  } else if (code === "TP") {
    severity = "error";
  } else if (code === "TD") {
    severity = "info";
  } else if (code === "TDM") {
    severity = "warning";
  }

  return (
    <CustomOutlinedAlert icon={false} severity={severity} variant="filled">
      {code}
    </CustomOutlinedAlert>
  );
};
