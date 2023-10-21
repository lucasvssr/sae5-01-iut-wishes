import * as React from "react";
import InputLabel from "@mui/material/InputLabel";
import MenuItem from "@mui/material/MenuItem";
import MaterialUISelect, { type SelectChangeEvent } from "@mui/material/Select";
import FormControl from "@mui/material/FormControl";

interface ISelectProps {
  items: Array<{
    name: React.ReactNode | string;
    value: string | number;
  }>;
  label: string;
}

export const Select: React.FC<ISelectProps> = ({ items, label }) => {
  const [value, setValue] = React.useState("");

  const handleChange = (event: SelectChangeEvent): void => {
    setValue(event.target.value);
  };

  return (
    <FormControl fullWidth>
      <InputLabel id={label}>{label}</InputLabel>
      <MaterialUISelect
        labelId={label}
        id={`${label}-select`}
        value={value}
        label={label}
        onChange={handleChange}
      >
        {items.map((item) => {
          return (
            <MenuItem key={item.value} value={item.value}>
              {item.name}
            </MenuItem>
          );
        })}
      </MaterialUISelect>
    </FormControl>
  );
};
