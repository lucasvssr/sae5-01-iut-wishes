import React, { type FormEvent } from "react";
import MaterialUIModal from "@mui/material/Modal";
import Box from "@mui/material/Box";
import { Text } from "../Text";
import { Title } from "../Title";
import FormControl from "@mui/material/FormControl";
import { Input } from "../Input";
import { Button } from "../Button";

export interface IModalProps {
  text: string;
  title: string;
  active?: boolean;
  handleSubmit: (event: FormEvent<HTMLFormElement>) => void;
  inputs: Array<{
    placeholder: string;
    name: string;
    value?: string;
    handleChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
    label: string;
  }>;
  handleClose: () => void;
}

const style = {
  position: "absolute" as "absolute",
  top: "50%",
  left: "50%",
  transform: "translate(-50%, -50%)",
  width: "100%",
  maxWidth: 400,
  bgcolor: "white",
  borderRadius: "9px",
  boxShadow: 24,
  fontFamily: "var(--title-font)",
  p: 4,
};

export const Modal: React.FC<IModalProps> = ({
  active = false,
  handleSubmit,
  inputs,
  handleClose,
  title,
  text,
}) => {
  return (
    <MaterialUIModal
      open={active}
      onClose={handleClose}
      aria-labelledby="modal-modal-title"
      aria-describedby="modal-modal-description"
    >
      <Box sx={style}>
        <Title>{title}</Title>
        <form onSubmit={handleSubmit}>
          <FormControl
            sx={{ display: "flex", flexDirection: "column", gap: "20px" }}
          >
            {inputs.map((input) => {
              return (
                <Input
                  key={input.name}
                  name={input.name}
                  placeholder={input.placeholder}
                  label={input.label}
                  value={input.value}
                  handleChange={input.handleChange}
                />
              );
            })}
            <div className="form-buttons">
              <Button
                size="medium"
                variant="contained"
                type="submit"
                color="success"
              >
                Valider
              </Button>
              <Button
                size="medium"
                variant="contained"
                type="reset"
                color="error"
              >
                Annuler
              </Button>
            </div>

            <Text>{text}</Text>
          </FormControl>
        </form>
      </Box>
    </MaterialUIModal>
  );
};
