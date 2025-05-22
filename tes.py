import itertools

def generate_words():
    queue = list(map(chr, range(97, 123)))  # Start with 'a' to 'z'
    while queue:
        word = queue.pop(0)
        yield word
        for char in itertools.chain(map(chr, range(97, 123))):
            queue.append(word + char)
            for num in map(str, range(10)):
                queue.append(word + char + num)

# Example usage:
gen = generate_words()
for _ in range(50):  # Generate first 50 words
    print(next(gen))
