import React, { type PropsWithChildren } from "react";
import { TextField } from "@mui/material";

interface IInputProps {
  placeholder: string;
  name: string;
  value?: string;
  handleChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
  label: string;
}

export const Input: React.FC<PropsWithChildren<IInputProps>> = ({
  placeholder,
  name,
  value,
  handleChange,
  label,
}) => {
  return (
    <TextField
      label={label}
      variant={"outlined"}
      placeholder={placeholder}
      name={name}
      value={value}
      onChange={handleChange}
    />
  );
};
