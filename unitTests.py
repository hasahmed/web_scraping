import unittest
import functions

class functionsTests(unittest.TestCase):
    def testPrependYouTube(self):
        self.assertEqual(functions.prependYouTube('/hey'), "https://www.youtube.com/hey")
        self.assertEqual(functions.prependYouTube("https://www.youtube.com/hey"), "https://www.youtube.com/hey")

    def testStripPlstInfo(self):
        self.assertEqual(functions.stripPlstInfo("hey&whatsup"), "hey")
        with self.assertRaises(ValueError):
            functions.stripPlstInfo("hey")

    def testStripPlstInfo_ls(self):
        unstripped = ['hey&whatsup', 'whats&goingon']
        stripped = ['hey', 'whats']
        functions.stripPlstInfo_ls(unstripped)
        self.assertEqual(unstripped, stripped)


if __name__ == '__main__':
    unittest.main()
