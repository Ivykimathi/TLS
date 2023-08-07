import os

def replace_words_in_file(file_path, old_word, new_word):
    with open(file_path, 'r') as file:
        file_contents = file.read()
    
    # Perform the replacement
    new_contents = file_contents.replace(old_word, new_word)

    # Write the updated contents back to the file
    with open(file_path, 'w') as file:
        file.write(new_contents)

def main():
    folder_path = 'C:\\xampp\\htdocs\\TLS2\\advocate'
    old_word_mapping = {'docid': 'advid', 'docname': 'advname'}

    for root, _, files in os.walk(folder_path):
        for file in files:
            file_path = os.path.join(root, file)
            # Only process text files, you can add more extensions if needed
            if file_path.endswith('.php'):
                print(f"Processing file: {file_path}")
                with open(file_path, 'r') as f:
                    content = f.read()
                    for old_word, new_word in old_word_mapping.items():
                        content = content.replace(old_word, new_word)
                with open(file_path, 'w') as f:
                    f.write(content)

if __name__ == "__main__":
    main()
